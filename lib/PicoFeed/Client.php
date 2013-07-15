<?php

namespace PicoFeed;

require_once __DIR__.'/Logging.php';

abstract class Client
{
    public $etag = '';
    public $last_modified = '';
    public $is_modified = true;
    public $content = '';
    public $url = '';
    public $timeout = 5;
    public $max_redirects = 5;
    public $user_agent = 'PicoFeed (https://github.com/fguillot/picoFeed)';


    public static function create($adapter = null)
    {
        return $adapter ?: self::chooseAdapter();
    }


    public static function chooseAdapter()
    {
        if (ini_get('allow_url_fopen')) {

            require_once __DIR__.'/Clients/Stream.php';
            return new Clients\Stream;
        }
        else if (function_exists('curl_init')) {

            require_once __DIR__.'/Clients/Curl.php';
            return new Clients\Curl;
        }

        throw new \LogicException('You must have "allow_url_fopen=1" or curl extension installed');
    }


    public function setLastModified($last_modified)
    {
        $this->last_modified = $last_modified;
        return $this;
    }


    public function getLastModified()
    {
        return $this->last_modified;
    }


    public function setEtag($etag)
    {
        $this->etag = $etag;
        return $this;
    }


    public function getEtag()
    {
        return $this->etag;
    }


    public function getUrl()
    {
        return $this->url;
    }


    public function getContent()
    {
        return $this->content;
    }


    public function isModified()
    {
        return $this->is_modified;
    }
}