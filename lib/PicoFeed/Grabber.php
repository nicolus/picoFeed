<?php

namespace PicoFeed;

require_once __DIR__.'/Client.php';
require_once __DIR__.'/Encoding.php';

class Grabber
{
    public $content = '';
    public $html = '';

    // Order is important
    public $candidatesAttributes = array(
        'article',
        'articleBody',
        'articlebody',
        'articleContent',
        'articlecontent',
        'post-content',
        'content',
        'main',
    );

    public $stripAttributes = array(
        'comment',
        'share',
        'links',
        'toolbar',
        'fb',
        'footer',
        'credit',
        'bottom',
        'nav',
        'header',
        'social',
    );

    public $stripTags = array(
        'script',
        'style',
        'nav',
        'header',
        'footer',
        'aside',
    );


    public function __construct($url)
    {
        $this->url = $url;
    }


    public function download($timeout = 5, $user_agent = 'PicoFeed (https://github.com/fguillot/picoFeed)')
    {
        $client = Client::create();
        $client->url = $this->url;
        $client->timeout = $timeout;
        $client->user_agent = $user_agent;
        $client->execute();

        $this->html = $client->getContent();
        $this->url = $client->getUrl();

        if ($this->html) {

            $this->html = Encoding::toUTF8($this->html);
            $rules = $this->getRules();

            \libxml_use_internal_errors(true);
            $dom = new \DOMDocument;
            $dom->loadHTML($this->html);

            if (is_array($rules)) {
                $this->parseContentWithRules($dom, $rules);
            }
            else {

                $this->parseContentWithCandidates($dom);

                if (strlen($this->content) < 50) {
                    $this->content = $dom->saveXML($dom->firstChild);
                }

                $this->stripGarbage();
            }
        }

        return $this->content !== '';
    }


    public function getRules()
    {
        $hostname = parse_url($this->url, PHP_URL_HOST);
        $files = array($hostname);

        if (substr($hostname, 0, 4) == 'www.') $files[] = substr($hostname, 4);
        if (($pos = strpos($hostname, '.')) !== false) $files[] = substr($hostname, $pos);

        foreach ($files as $file) {

            $filename = __DIR__.'/Rules/'.$file.'.php';

            if (file_exists($filename)) {
                return include $filename;
            }
        }

        return false;
    }


    public function parseContentWithRules($dom, array $rules)
    {
        $xpath = new \DOMXPath($dom);

        if (isset($rules['strip']) && is_array($rules['strip'])) {

            foreach ($rules['strip'] as $pattern) {

                $nodes = $xpath->query($pattern);

                if ($nodes !== false && $nodes->length > 0) {
                    foreach ($nodes as $node) {
                        $node->parentNode->removeChild($node);
                    }
                }
            }
        }

        if (isset($rules['strip_id_or_class']) && is_array($rules['strip_id_or_class'])) {

            foreach ($rules['strip_id_or_class'] as $pattern) {

                $pattern = strtr($pattern, array("'" => '', '"' => ''));
                $nodes = $xpath->query("//*[contains(@class, '$pattern') or contains(@id, '$pattern')]");

                if ($nodes !== false && $nodes->length > 0) {
                    foreach ($nodes as $node) {
                        $node->parentNode->removeChild($node);
                    }
                }
            }
        }

        if (isset($rules['body']) && is_array($rules['body'])) {

            foreach ($rules['body'] as $pattern) {

                $nodes = $xpath->query($pattern);

                if ($nodes !== false && $nodes->length > 0) {
                    foreach ($nodes as $node) {
                        $this->content .= $dom->saveXML($node);
                    }
                }
            }
        }
    }


    public function parseContentWithCandidates($dom)
    {
        $xpath = new \DOMXPath($dom);

        // Try to fetch <article/>
        $nodes = $xpath->query('//article');

        if ($nodes !== false && $nodes->length > 0) {
            $this->content = $dom->saveXML($nodes->item(0));
            return;
        }

        // Try to lookup in each <div/>
        foreach ($this->candidatesAttributes as $candidate) {

            $nodes = $xpath->query('//div[(contains(@class, "'.$candidate.'") or @id="'.$candidate.'") and not (contains(@class, "nav") or contains(@class, "page"))]');

            if ($nodes !== false && $nodes->length > 0) {
                $this->content = $dom->saveXML($nodes->item(0));
                return;
            }
        }
    }


    public function stripGarbage()
    {
        \libxml_use_internal_errors(true);
        $dom = new \DOMDocument;
        $dom->loadXML($this->content);
        $xpath = new \DOMXPath($dom);

        foreach ($this->stripTags as $tag) {

            $nodes = $xpath->query('//'.$tag);

            if ($nodes !== false && $nodes->length > 0) {
                foreach ($nodes as $node) {
                    $node->parentNode->removeChild($node);
                }
            }
        }

        foreach ($this->stripAttributes as $attribute) {

            $nodes = $xpath->query('//*[contains(@class, "'.$attribute.'") or contains(@id, "'.$attribute.'")]');

            if ($nodes !== false && $nodes->length > 0) {
                foreach ($nodes as $node) {
                    $node->parentNode->removeChild($node);
                }
            }
        }

        $this->content = '';

        foreach($dom->childNodes as $node) {
            $this->content .= $dom->saveXML($node);
        }
    }
}
