<?php

namespace PicoFeed\Clients;

use \PicoFeed\Logging;

class Curl extends \PicoFeed\Client
{
    public function doRequest()
    {
        Logging::log('Fetch URL: '.$this->url);
        Logging::log('Etag: '.$this->etag);
        Logging::log('Last-Modified: '.$this->last_modified);

        $request_headers = array('Connection: close');

        if ($this->etag) $request_headers[] = 'If-None-Match: '.$this->etag;
        if ($this->last_modified) $request_headers[] = 'If-Modified-Since: '.$this->last_modified;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $this->timeout);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->user_agent);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $request_headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, $this->max_redirects);
        curl_setopt($ch, CURLOPT_ENCODING, '');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // For auto-signed certificates...

        $response = curl_exec($ch);

        Logging::log('cURL total time: '.curl_getinfo($ch, CURLINFO_TOTAL_TIME));
        Logging::log('cURL dns lookup time: '.curl_getinfo($ch, CURLINFO_NAMELOOKUP_TIME));
        Logging::log('cURL connect time: '.curl_getinfo($ch, CURLINFO_CONNECT_TIME));
        Logging::log('cURL speed download: '.curl_getinfo($ch, CURLINFO_SPEED_DOWNLOAD));

        if (curl_errno($ch)) {

            Logging::log('cURL error: '.curl_error($ch));

            curl_close($ch);
            return false;
        }

        curl_close($ch);

        $status = (int) substr($response, 9, 3);

        if ($status === 301 || $status === 302) {

            // If there is a redirect, all headers are merged
            list(,$response_headers, $body) = explode("\r\n\r\n", $response, 3);
        }
        else {

            list($response_headers, $body) = explode("\r\n\r\n", $response, 2);
        }

        list($status, $headers) = $this->parseHeaders(explode("\r\n", $response_headers));

        return array(
            'status' => $status,
            'body' => $body,
            'headers' => $headers
        );
    }
}