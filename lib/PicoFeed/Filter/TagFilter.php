<?php

namespace PicoFeed\Filter;

use DOMXPath;
use PicoFeed\Base;
use PicoFeed\Parser\XmlParser;

/**
 * TagFilter Filter class.
 *
 * @author  Frederic Guillot
 */
class TagFilter extends Base
{
    /**
     * Tags blacklist (Xpath expressions).
     *
     * @var array
     */
    private $tag_blacklist = array(
        '//script',
        '//style',
    );

    /**
     * Tags whitelist.
     *
     * @var array
     */
    private $tag_whitelist = array(
        'audio',
        'video',
        'source',
        'dt',
        'dd',
        'dl',
        'table',
        'caption',
        'tr',
        'th',
        'td',
        'tbody',
        'thead',
        'h1',
        'h2',
        'h3',
        'h4',
        'h5',
        'h6',
        'strong',
        'em',
        'code',
        'pre',
        'blockquote',
        'p',
        'ul',
        'li',
        'ol',
        'br',
        'del',
        'a',
        'img',
        'figure',
        'figcaption',
        'cite',
        'time',
        'abbr',
        'iframe',
        'q',
        'sup',
        'sub',
    );

    /**
     * Check if the tag is allowed and is not a pixel tracker.
     *
     * @param Tag $tag
     * @return bool
     */
    public function isAllowed(Tag $tag)
    {
        return $this->isAllowedTag($tag->name) && !$this->isPixelTracker($tag);
    }

    /**
     * Return the HTML opening tag.
     *
     * @param string $tag        TagFilter name
     * @param string $attributes Attributes converted in html
     * @return string
     */
    public function openHtmlTag($tag, $attributes = '')
    {
        return '<'.$tag.(empty($attributes) ? '' : ' '.$attributes).($this->isSelfClosingTag($tag) ? '/>' : '>');
    }

    /**
     * Return the HTML closing tag.
     *
     * @param string $tag TagFilter name
     * @return string
     */
    public function closeHtmlTag($tag)
    {
        return $this->isSelfClosingTag($tag) ? '' : '</'.$tag.'>';
    }

    /**
     * Return true is the tag is self-closing.
     *
     * @param string $tag TagFilter name
     * @return bool
     */
    public function isSelfClosingTag($tag)
    {
        return $tag === 'br' || $tag === 'img';
    }

    /**
     * Check if a tag is on the whitelist.
     *
     * @param string $tagName Tag name
     * @return bool
     */
    public function isAllowedTag($tagName)
    {
        return in_array($tagName, array_merge(
            $this->tag_whitelist,
            array_keys($this->config->getFilterWhitelistedTags(array()))
        ));
    }

    /**
     * Detect if an image tag is a pixel tracker.
     *
     * @param Tag $tag
     * @return bool
     */
    public function isPixelTracker(Tag $tag)
    {
        return $tag->name === 'img' &&
            isset($attributes['height']) && isset($attributes['width']) &&
            $tag->attributes['height'] == 1 && $tag->attributes['width'] == 1;
    }

    /**
     * Remove script tags.
     *
     * @param string $data Input data
     * @return string
     * @throws \PicoFeed\Parser\XmlEntityException
     */
    public function removeBlacklistedTags($data)
    {
        $dom = XmlParser::getDomDocument($data);

        if ($dom === false) {
            return '';
        }

        $xpath = new DOMXpath($dom);

        $nodes = $xpath->query(implode(' | ', $this->tag_blacklist));

        foreach ($nodes as $node) {
            $node->parentNode->removeChild($node);
        }

        return $dom->saveXML();
    }

    /**
     * Remove empty tags.
     *
     * @param string $data Input data
     * @return string
     */
    public function removeEmptyTags($data)
    {
        return preg_replace('/<([^<\/>]*)>([\s]*?|(?R))<\/\1>/imsU', '', $data);
    }

    /**
     * Replace <br/><br/> by only one.
     *
     * @param string $data Input data
     * @return string
     */
    public function removeMultipleBreakTags($data)
    {
        return preg_replace("/(<br\s*\/?>\s*)+/", '<br/>', $data);
    }

    /**
     * Set whitelisted tags adn attributes for each tag.
     *
     * @param array $values List of tags: ['video' => ['src', 'cover'], 'img' => ['src']]
     * @return TagFilter
     */
    public function setWhitelistedTags(array $values)
    {
        $this->tag_whitelist = $values ?: $this->tag_whitelist;

        return $this;
    }
}
