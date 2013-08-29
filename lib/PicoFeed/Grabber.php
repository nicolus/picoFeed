<?php

namespace PicoFeed;

require_once __DIR__.'/Client.php';
require_once __DIR__.'/Encoding.php';

class Grabber
{
    public $title = '';
    public $content = '';

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

        $html = $client->getContent();
        $this->url = $client->getUrl();

        if ($html) {

            $html = Encoding::toUTF8($html);
            $rules = $this->getRules();

            if (is_array($rules)) {
                $this->parseContentWithRules($html, $rules);
            }
        }

        return $this->title && $this->content;
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

    public function parseContentWithRules($html, array $rules)
    {
        \libxml_use_internal_errors(true);

        $dom = new \DOMDocument;
        $dom->loadHTML($html);

        $xpath = new \DOMXPath($dom);

        if (isset($rules['title'])) {
            $nodes = $xpath->query($rules['title']);

            if ($nodes !== false && $nodes->length >= 1) {
                $this->title = $nodes->item(0)->textContent;
            }
        }

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
var_dump($pattern, $nodes);
                if ($nodes !== false && $nodes->length > 0) {
                    foreach ($nodes as $node) {
                        $this->content .= $dom->saveXML($node);
                    }
                }
            }
        }
    }
}
