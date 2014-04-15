<?php

namespace PicoFeed;

/**
 * Filter class
 *
 * @author  Frederic Guillot
 * @package parser
 */
class Filter
{
    /**
     * Filtered XML data
     *
     * @access private
     * @var string
     */
    private $data = '';

    /**
     * Site URL (used to build absolute URL)
     *
     * @access private
     * @var string
     */
    private $url = '';

    /**
     * Unfiltered XML data
     *
     * @access private
     * @var string
     */
    private $input = '';

    /**
     * List of empty tags
     *
     * @access private
     * @var array
     */
    private $empty_tags = array();

    /**
     * Flag to remove the content of a tag
     *
     * @access private
     * @var boolean
     */
    private $strip_content = false;

    /**
     * Flag to remember if the current payload is a source code <pre/>
     *
     * @access private
     * @var boolean
     */
    private $is_code = false;

    /**
     * Tags and attribute whitelist
     *
     * @static
     * @access public
     * @var array
     */
    public static $whitelist_tags = array(
        'audio' => array('controls', 'src'),
        'video' => array('poster', 'controls', 'height', 'width', 'src'),
        'source' => array('src', 'type'),
        'dt' => array(),
        'dd' => array(),
        'dl' => array(),
        'table' => array(),
        'caption' => array(),
        'tr' => array(),
        'th' => array(),
        'td' => array(),
        'tbody' => array(),
        'thead' => array(),
        'h2' => array(),
        'h3' => array(),
        'h4' => array(),
        'h5' => array(),
        'h6' => array(),
        'strong' => array(),
        'em' => array(),
        'code' => array(),
        'pre' => array(),
        'blockquote' => array(),
        'p' => array(),
        'ul' => array(),
        'li' => array(),
        'ol' => array(),
        'br' => array(),
        'del' => array(),
        'a' => array('href'),
        'img' => array('src', 'title', 'alt'),
        'figure' => array(),
        'figcaption' => array(),
        'cite' => array(),
        'time' => array('datetime'),
        'abbr' => array('title'),
        'iframe' => array('width', 'height', 'frameborder', 'src'),
        'q' => array('cite')
    );

    /**
     * Tags blacklist, strip the content of those tags
     *
     * @static
     * @access public
     * @var array
     */
    public static $blacklist_tags = array(
        'script'
    );

    /**
     * Scheme whitelist
     * For a complete list go to http://en.wikipedia.org/wiki/URI_scheme
     *
     * @static
     * @access public
     * @var array
     */
    public static $scheme_whitelist = array(
        '//',
        'data:image/png;base64,',
        'data:image/gif;base64,',
        'data:image/jpg;base64,',
        'bitcoin:',
        'callto:',
        'ed2k://',
        'facetime://',
        'feed:',
        'ftp://',
        'geo:',
        'git://',
        'http://',
        'https://',
        'irc://',
        'irc6://',
        'ircs://',
        'jabber:',
        'magnet:',
        'mailto:',
        'nntp://',
        'rtmp://',
        'sftp://',
        'sip:',
        'sips:',
        'skype:',
        'smb://',
        'sms:',
        'spotify:',
        'ssh:',
        'steam:',
        'svn://',
        'tel:',
    );

    /**
     * Attributes used for external resources
     *
     * @static
     * @access public
     * @var array
     */
    public static $media_attributes = array(
        'src',
        'href',
        'poster',
    );

    /**
     * Blacklisted resources
     *
     * @static
     * @access public
     * @var array
     */
    public static $media_blacklist = array(
        'feeds.feedburner.com',
        'share.feedsportal.com',
        'da.feedsportal.com',
        'rss.feedsportal.com',
        'res.feedsportal.com',
        'res1.feedsportal.com',
        'res2.feedsportal.com',
        'res3.feedsportal.com',
        'pi.feedsportal.com',
        'rss.nytimes.com',
        'feeds.wordpress.com',
        'stats.wordpress.com',
        'rss.cnn.com',
        'twitter.com/home?status=',
        'twitter.com/share',
        'twitter_icon_large.png',
        'www.facebook.com/sharer.php',
        'facebook_icon_large.png',
        'plus.google.com/share',
        'www.gstatic.com/images/icons/gplus-16.png',
        'www.gstatic.com/images/icons/gplus-32.png',
        'www.gstatic.com/images/icons/gplus-64.png',
    );

    /**
     * Mandatory attributes for specified tags
     *
     * @static
     * @access public
     * @var array
     */
    public static $required_attributes = array(
        'a' => array('href'),
        'img' => array('src'),
        'iframe' => array('src'),
        'audio' => array('src'),
        'source' => array('src'),
    );

    /**
     * Add attributes to specified tags
     *
     * @static
     * @access public
     * @var array
     */
    public static $add_attributes = array(
        'a' => 'rel="noreferrer" target="_blank"'
    );

    /**
     * Attributes that must be integer
     *
     * @static
     * @access public
     * @var array
     */
    public static $integer_attributes = array(
        'width',
        'height',
        'frameborder',
    );

    /**
     * Iframe source whitelist, everything else is ignored
     *
     * @static
     * @access public
     * @var array
     */
    public static $iframe_whitelist = array(
        '//www.youtube.com',
        'http://www.youtube.com',
        'https://www.youtube.com',
        'http://player.vimeo.com',
        'https://player.vimeo.com',
        'http://www.dailymotion.com',
        'https://www.dailymotion.com',
    );

    /**
     * Initialize the filter, all inputs data must be encoded in UTF-8 before
     *
     * @access public
     * @param  string  $data      XML content
     * @param  string  $site_url  Site URL (used to build absolute URL)
     */
    public function __construct($data, $site_url)
    {
        $this->url = $site_url;

        \libxml_use_internal_errors(true);

        // Convert bad formatted documents to XML
        $dom = new \DOMDocument;
        $dom->loadHTML('<?xml version="1.0" encoding="UTF-8">'.$data);
        $this->input = $dom->saveXML($dom->getElementsByTagName('body')->item(0));
    }

    /**
     * Run tags/attributes filtering
     *
     * @access public
     * @return string
     */
    public function execute()
    {
        $parser = xml_parser_create();
        xml_set_object($parser, $this);
        xml_set_element_handler($parser, 'startTag', 'endTag');
        xml_set_character_data_handler($parser, 'dataTag');
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, false);
        xml_parse($parser, $this->input, true); // We ignore parsing error (for old libxml)
        xml_parser_free($parser);

        $this->data = $this->removeEmptyTags($this->data);
        $this->data = $this->removeMultipleTags($this->data);

        return $this->data;
    }

    /**
     * Parse opening tag
     *
     * @access public
     * @param  resource  $parser       XML parser
     * @param  string    $name         Tag name
     * @param  array     $attributes   Tag attributes
     */
    public function startTag($parser, $name, $attributes)
    {
        $empty_tag = false;
        $this->strip_content = false;

        if ($this->is_code === false && $name === 'pre') $this->is_code = true;

        if ($this->isPixelTracker($name, $attributes)) {

            $empty_tag = true;
        }
        else if ($this->isAllowedTag($name)) {

            $attr_data = '';
            $used_attributes = array();

            foreach ($attributes as $attribute => $value) {

                if ($value != '' && $this->isAllowedAttribute($name, $attribute)) {

                    if ($this->isResource($attribute)) {

                        if ($name === 'iframe') {

                            if ($this->isAllowedIframeResource($value)) {

                                $attr_data .= ' '.$attribute.'="'.$this->escape($value).'"';
                                $used_attributes[] = $attribute;
                            }
                        }
                        else if ($this->isRelativePath($value)) {

                            $attr_data .= ' '.$attribute.'="'.$this->escape($this->getAbsoluteUrl($value, $this->url)).'"';
                            $used_attributes[] = $attribute;
                        }
                        else if ($this->isAllowedProtocol($value) && ! $this->isBlacklistedMedia($value)) {

                            if ($attribute == 'src' &&
                                isset($attributes['data-src']) &&
                                $this->isAllowedProtocol($attributes['data-src']) &&
                                ! $this->isBlacklistedMedia($attributes['data-src'])) {

                                $value = $attributes['data-src'];
                            }

                            // Replace protocol-relative url // by http://
                            if (substr($value, 0, 2) === '//') $value = 'http:'.$value;

                            $attr_data .= ' '.$attribute.'="'.$this->escape($value).'"';
                            $used_attributes[] = $attribute;
                        }
                    }
                    else if ($this->validateAttributeValue($attribute, $value)) {

                        $attr_data .= ' '.$attribute.'="'.$this->escape($value).'"';
                        $used_attributes[] = $attribute;
                    }
                }
            }

            // Check for required attributes
            if (isset(self::$required_attributes[$name])) {

                foreach (self::$required_attributes[$name] as $required_attribute) {

                    if (! in_array($required_attribute, $used_attributes)) {

                        $empty_tag = true;
                        break;
                    }
                }
            }

            if (! $empty_tag) {

                $this->data .= '<'.$name.$attr_data;

                // Add custom attributes
                if (isset(self::$add_attributes[$name])) {

                    $this->data .= ' '.self::$add_attributes[$name].' ';
                }

                // If img or br, we don't close it here
                if ($name !== 'img' && $name !== 'br') $this->data .= '>';
            }
        }

        if (in_array($name, self::$blacklist_tags)) {
            $this->strip_content = true;
        }

        $this->empty_tags[] = $empty_tag;
    }

    /**
     * Parse closing tag
     *
     * @access public
     * @param  resource  $parser    XML parser
     * @param  string    $name      Tag name
     */
    public function endTag($parser, $name)
    {
        if (! array_pop($this->empty_tags) && $this->isAllowedTag($name)) {
            $this->data .= $name !== 'img' && $name !== 'br' ? '</'.$name.'>' : '/>';
        }

        if ($this->is_code && $name === 'pre') $this->is_code = false;
    }

    /**
     * Parse tag content
     *
     * @access public
     * @param  resource  $parser    XML parser
     * @param  string    $content   Tag content
     */
    public function dataTag($parser, $content)
    {
        $content = str_replace("\xc2\xa0", ' ', $content); // Replace &nbsp; with normal space

        // Issue with Cyrillic characters
        // Replace mutliple space by a single one
        // if (! $this->is_code) {
        //     $content = preg_replace('!\s+!', ' ', $content);
        // }

        if (! $this->strip_content) {
            $this->data .= $this->escape($content);
        }
    }

    /**
     * Escape HTML content
     *
     * @static
     * @access public
     * @return string
     */
    public static function escape($content)
    {
        return htmlspecialchars($content, ENT_QUOTES, 'UTF-8', false);
    }

    /**
     * Get the absolute url for a relative link
     *
     * @access public
     * @param  string  $path   Relative path
     * @param  string  $url    Site base url
     * @return string
     */
    public static function getAbsoluteUrl($path, $url)
    {
        $components = parse_url($url);

        if (! isset($components['scheme'])) $components['scheme'] = 'http';

        if (! isset($components['host'])) {

            if ($url) {

                $components['host'] = $url;
                $components['path'] = '/';
            }
            else {

                return '';
            }
        }

        if (! strlen($path)) return $url;

        if ($path{0} === '/') {

            // Absolute path
            return $components['scheme'].'://'.$components['host'].$path;
        }
        else {

            // Relative path
            $url_path = isset($components['path']) && ! empty($components['path']) ? $components['path'] : '/';
            $length = strlen($url_path);

            if ($length > 1 && $url_path{$length - 1} !== '/') {
                $url_path = dirname($url_path).'/';
            }

            if (substr($path, 0, 2) === './') {
                $path = substr($path, 2);
            }

            return $components['scheme'].'://'.$components['host'].$url_path.$path;
        }
    }

    /**
     * Check if an url is relative
     *
     * @access public
     * @param  string  $value   Attribute value
     * @return boolean
     */
    public static function isRelativePath($value)
    {
        if (strpos($value, 'data:') === 0) return false;
        return strpos($value, '://') === false && strpos($value, '//') !== 0;
    }

    /**
     * Check if a tag is on the whitelist
     *
     * @access public
     * @param  string  $name   Tag name
     * @return boolean
     */
    public function isAllowedTag($name)
    {
        return isset(self::$whitelist_tags[$name]);
    }

    /**
     * Check if an attribute is allowed for a given tag
     *
     * @access public
     * @param  string  $tag        Tag name
     * @param  array   $attribute  Attribute name
     * @return boolean
     */
    public function isAllowedAttribute($tag, $attribute)
    {
        return in_array($attribute, self::$whitelist_tags[$tag]);
    }

    /**
     * Check if an attribute name is an external resource
     *
     * @access public
     * @param  string  $data  Attribute name
     * @return boolean
     */
    public function isResource($attribute)
    {
        return in_array($attribute, self::$media_attributes);
    }

    /**
     * Check if an iframe url is allowed
     *
     * @access public
     * @param  string  $value  Attribute value
     * @return boolean
     */
    public function isAllowedIframeResource($value)
    {
        foreach (self::$iframe_whitelist as $url) {

            if (strpos($value, $url) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Detect if the protocol is allowed or not
     *
     * @access public
     * @param  string  $value  Attribute value
     * @return boolean
     */
    public function isAllowedProtocol($value)
    {
        foreach (self::$scheme_whitelist as $protocol) {

            if (strpos($value, $protocol) === 0) {
                return true;
            }
        }

        return false;
    }

    /**
     * Detect if an url is blacklisted
     *
     * @access public
     * @param  string  $resouce  Attribute value (URL)
     * @return boolean
     */
    public function isBlacklistedMedia($resource)
    {
        foreach (self::$media_blacklist as $name) {

            if (strpos($resource, $name) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Detect if an image tag is a pixel tracker
     *
     * @access public
     * @param  string  $tag         Tag name
     * @param  array   $attributes  Tag attributes
     * @return boolean
     */
    public function isPixelTracker($tag, array $attributes)
    {
        return $tag === 'img' &&
                isset($attributes['height']) && isset($attributes['width']) &&
                $attributes['height'] == 1 && $attributes['width'] == 1;
    }

    /**
     * Check if an attribute value is integer
     *
     * @access public
     * @param  string  $attribute   Attribute name
     * @param  string  $value       Attribute value
     * @return boolean
     */
    public function validateAttributeValue($attribute, $value)
    {
        if (in_array($attribute, self::$integer_attributes)) {
            return ctype_digit($value);
        }

        return true;
    }

    /**
     * Replace <br/><br/> by only one
     *
     * @access public
     * @param  string  $data  Input data
     * @return string
     */
    public function removeMultipleTags($data)
    {
        return preg_replace("/(<br\s*\/?>\s*)+/", "<br/>", $data);
    }

    /**
     * Remove empty tags
     *
     * @access public
     * @param  string  $data  Input data
     * @return string
     */
    public function removeEmptyTags($data)
    {
        return preg_replace('/<([^<\/>]*)>([\s]*?|(?R))<\/\1>/imsU', '', $data);
    }

    /**
     * Remove HTML tags
     *
     * @access public
     * @param  string  $data  Input data
     * @return string
     */
    public function removeHTMLTags($data)
    {
        return preg_replace('~<(?:!DOCTYPE|/?(?:html|head|body))[^>]*>\s*~i', '', $data);
    }

    /**
     * Remove the XML tag from a document
     *
     * @static
     * @access public
     * @param  string  $data  Input data
     * @return string
     */
    public static function stripXmlTag($data)
    {
        if (strpos($data, '<?xml') !== false) {
            $data = ltrim(substr($data, strpos($data, '?>') + 2));
        }

        do {

            $pos = strpos($data, '<?xml-stylesheet ');

            if ($pos !== false) {
                $data = ltrim(substr($data, strpos($data, '?>') + 2));
            }

        } while ($pos !== false && $pos < 200);

        return $data;
    }

    /**
     * Strip head tag from the HTML content
     *
     * @static
     * @access public
     * @param  string  $data  Input data
     * @return string
     */
    public static function stripHeadTags($data)
    {
        $start = strpos($data, '<head>');
        $end = strpos($data, '</head>');

        if ($start !== false && $end !== false) {
            $before = substr($data, 0, $start);
            $after = substr($data, $end + 7);
            $data = $before.$after;
        }

        return $data;
    }

    /**
     * Get the encoding from a xml tag
     *
     * @static
     * @access public
     * @param  string  $data  Input data
     * @return string
     */
    public static function getEncodingFromXmlTag($data)
    {
        $encoding = '';

        if (strpos($data, '<?xml') !== false) {

            $data = substr($data, 0, strrpos($data, '?>'));
            $data = str_replace("'", '"', $data);

            $p1 = strpos($data, 'encoding=');
            $p2 = strpos($data, '"', $p1 + 10);

            $encoding = substr($data, $p1 + 10, $p2 - $p1 - 10);
            $encoding = strtolower($encoding);
        }

        return $encoding;
    }
}
