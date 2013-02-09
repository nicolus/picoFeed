<?php

namespace PicoFeed;

class Reader
{
    private $url = '';
    private $content = '';


    public function __construct($content = '')
    {
        $this->content = $content;

        return $this;
    }


    public function download($url)
    {
        $this->url = $url;
        $this->content = file_get_contents($this->url);

        return $this;
    }


    public function getContent()
    {
        return $this->content;
    }


    public function getParser()
    {
        $first_lines = substr($this->content, 0, 512);

        if (strpos($first_lines, '<feed ') !== false) {

            return new Atom($this->content);
        }
        else if (strpos($first_lines, '<rss ') !== false && strpos($first_lines, 'version="2.0"') !== false) {

            return new Rss20($this->content);
        }
        else if (strpos($first_lines, '<rdf') !== false && strpos($first_lines, 'xmlns="http://purl.org/rss/1.0/"') !== false) {

            return new Rss10($this->content);
        }

        return false;
    }
}
