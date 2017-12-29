<?php

namespace PicoFeed\Client;

use DateTime;
use Exception;
use GuzzleHttp\ClientInterface;
use PicoFeed\Logging\Logger;
use PicoFeed\Config\Config;
use Psr\Http\Message\ResponseInterface;

/**
 * Client class.
 *
 * @author  Frederic Guillot
 */
class Client
{
    /**
     * Flag that say if the resource have been modified.
     *
     * @var bool
     */
    private $is_modified = true;

    /**
     * HTTP Content-Type.
     *
     * @var string
     */
    private $content_type = '';

    /**
     * HTTP encoding.
     *
     * @var string
     */
    private $encoding = '';

    /**
     * HTTP request headers.
     *
     * @var array
     */
    protected $request_headers = array();

    /**
     * HTTP Etag header.
     *
     * @var string
     */
    protected $etag = '';

    /**
     * HTTP Last-Modified header.
     *
     * @var string
     */
    protected $last_modified = '';

    /**
     * Expiration DateTime
     *
     * @var DateTime
     */
    protected $expiration = null;

    /**
     * Real URL used (can be changed after a HTTP redirect).
     *
     * @var string
     */
    protected $url = '';

    /**
     * Page/Feed content.
     *
     * @var string
     */
    protected $content = '';

    /**
     * HTTP response status code.
     *
     * @var int
     */
    protected $status_code = 0;

    /**
     * Enables direct passthrough to requesting client.
     *
     * @var bool
     */
    protected $passthrough = false;

    /**
     * Http client used to make requests
     *
     * @var \GuzzleHttp\Client
     */
    private $httpClient;

    /**
     * Do the HTTP request.
     *
     * @return ResponseInterface
     */
    public function doRequest()
    {
        return $this->httpClient->get($this->url);
    }

    public function __construct(ClientInterface $httpClient = null)
    {
        $this->httpClient = $httpClient ?: new \GuzzleHttp\Client();
    }

    /**
     * Get client instance: curl or stream driver.
     *
     * @static
     *
     * @return \PicoFeed\Client\Client
     */
    public static function getInstance()
    {
        return new self(new \GuzzleHttp\Client([]));
    }

    /**
     * Add HTTP Header to the request.
     *
     * @param array $headers
     */
    public function setHeaders($headers)
    {
        $this->request_headers = $headers;
    }

    /**
     * Perform the HTTP request.
     *
     * @param string $url URL
     *
     * @return Client
     */
    public function execute($url = '')
    {
        if ($url !== '') {
            $this->url = $url;
        }

        Logger::setMessage(get_called_class() . ' Fetch URL: ' . $this->url);
        Logger::setMessage(get_called_class() . ' Etag provided: ' . $this->etag);
        Logger::setMessage(get_called_class() . ' Last-Modified provided: ' . $this->last_modified);

        $response = $this->doRequest();
        if ($response) {
            if ($this->isPassthroughEnabled()) {
                echo $response->getBody()->getContents();
            };

            $this->handleResponse($response);
            $this->expiration = $this->parseExpiration($response);
        }


        Logger::setMessage(get_called_class() . ' Expiration: ' . $this->expiration->format(DATE_ISO8601));

        return $this;
    }


    /**
     * Handle normal response.
     *
     * @param ResponseInterface $response Client response
     */
    protected function handleResponse(ResponseInterface $response)
    {
        if ($response->getStatusCode() == 200) {
            $this->content = $response->getBody()->getContents();
            $this->content_type = $this->findContentType($response);
            $this->encoding = $this->findCharset();
        }
    }

    /**
     * Find content type from response headers.
     *
     * @param ResponseInterface $response Client response
     * @return string
     */
    public function findContentType(ResponseInterface $response)
    {
        return strtolower($response->getHeader('content-type')[0]);
    }

    /**
     * Find charset from response headers.
     *
     * @return string
     */
    public function findCharset()
    {
        $result = explode('charset=', $this->content_type);
        return isset($result[1]) ? $result[1] : '';
    }

    /**
     * Get header value from a client response.
     *
     * @param array $response Client response
     * @param string $header Header name
     * @return string
     */
    public function getHeader(array $response, $header)
    {
        return isset($response['headers'][$header]) ? $response['headers'][$header][0] : '';
    }

    /**
     * Set the Last-Modified HTTP header.
     *
     * @param string $last_modified Header value
     * @return $this
     */
    public function setLastModified($last_modified)
    {
        $this->last_modified = $last_modified;
        return $this;
    }

    /**
     * Get the value of the Last-Modified HTTP header.
     *
     * @return string
     */
    public function getLastModified()
    {
        return $this->last_modified;
    }

    /**
     * Set the value of the Etag HTTP header.
     *
     * @param string $etag Etag HTTP header value
     * @return $this
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;
        return $this;
    }

    /**
     * Get the Etag HTTP header value.
     *
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Get the final url value.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the url.
     *
     * @param  $url
     * @return string
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Get the HTTP response status code.
     *
     * @return int
     */
    public function getStatusCode()
    {
        return $this->status_code;
    }

    /**
     * Get the body of the HTTP response.
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Get the content type value from HTTP headers.
     *
     * @return string
     */
    public function getContentType()
    {
        return $this->content_type;
    }

    /**
     * Get the encoding value from HTTP headers.
     *
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Return true if the remote resource has changed.
     *
     * @return bool
     */
    public function isModified()
    {
        return $this->is_modified;
    }

    /**
     * return true if passthrough mode is enabled.
     *
     * @return bool
     */
    public function isPassthroughEnabled()
    {
        return $this->passthrough;
    }

    /**
     * Enable the passthrough mode.
     *
     * @return $this
     */
    public function enablePassthroughMode()
    {
        $this->passthrough = true;
        return $this;
    }

    /**
     * Disable the passthrough mode.
     *
     * @return $this
     */
    public function disablePassthroughMode()
    {
        $this->passthrough = false;
        return $this;
    }

    /**
     * Return true if the HTTP status code is a redirection
     *
     * @access protected
     * @param  integer $code
     * @return boolean
     */
    public function isRedirection($code)
    {
        return $code == 301 || $code == 302 || $code == 303 || $code == 307;
    }

    public function parseExpiration(ResponseInterface $response)
    {
        try {

            if ($cacheControl = $response->getHeader('Cache-Control')[0]) {
                if (preg_match('/s-maxage=(\d+)/', $cacheControl, $matches)) {
                    return new DateTime('+' . $matches[1] . ' seconds');
                } else if (preg_match('/max-age=(\d+)/', $cacheControl, $matches)) {
                    return new DateTime('+' . $matches[1] . ' seconds');
                }
            }

            if ($expires = $response->getHeader('Expires')[0]) {
                return new DateTime($expires);
            }
        } catch (Exception $e) {
            Logger::setMessage('Unable to parse expiration date: ' . $e->getMessage());
        }

        return new DateTime();
    }

    /**
     * Get expiration date time from "Expires" or "Cache-Control" headers
     *
     * @return DateTime
     */
    public function getExpiration()
    {
        return $this->expiration ?: new DateTime();
    }
}
