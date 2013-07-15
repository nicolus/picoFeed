<?php

namespace PicoFeed\Clients;

use \PicoFeed\Logging;

class Stream extends \PicoFeed\Client
{
    public function execute()
    {
        if ($this->url === '') {
            throw new \LogicException('The URL is missing');
        }

        $response = $this->doRequest();

        if ($response['status'] == 304) {

            $this->is_modified = false;
        }
        else {

            $this->etag = isset($response['headers']['ETag']) ? $response['headers']['ETag'] : '';
            $this->last_modified = isset($response['headers']['Last-Modified']) ? $response['headers']['Last-Modified'] : '';
            $this->content = $response['body'];
        }
    }


    public function doRequest()
    {
        $http_code = 200;
        $http_body = '';
        $http_headers = array();

        Logging::log('Fetch URL: '.$this->url);
        Logging::log('Etag: '.$this->etag);
        Logging::log('Last-Modified: '.$this->last_modified);

        // Prepare HTTP headers for the request
        $headers = array(
            'Connection: close',
            'User-Agent: '.$this->user_agent,
        );

        if ($this->etag) $headers[] = 'If-None-Match: '.$this->etag;
        if ($this->last_modified) $headers[] = 'If-Modified-Since: '.$this->last_modified;

        // Create context
        $context_options = array(
            'http' => array(
                'method' => 'GET',
                'protocol_version' => 1.1,
                'timeout' => $this->timeout,
                'max_redirects' => $this->max_redirects,
                'header' => implode("\r\n", $headers)
            )
        );

        $context = stream_context_create($context_options);

        // Make HTTP request, TODO: more robust data fetching
        $stream = fopen($this->url, 'r', false, $context);
        $http_body = stream_get_contents($stream);

        // Get HTTP headers response
        $metadata = stream_get_meta_data($stream);

        foreach ($metadata['wrapper_data'] as $line) {

            if (strpos($line, 'HTTP') === 0 && strpos($line, '301') === false && strpos($line, '302') === false) {

                $http_code = (int) substr($line, 9, 3);
            }
            else if (strpos($line, ':') !== false) {

                list($name, $value) = explode(': ', $line);
                $http_headers[trim($name)] = trim($value);
            }
        }

        fclose($stream);

        return array(
            'status' => $http_code,
            'body' => $http_body,
            'headers' => $http_headers
        );
    }
}