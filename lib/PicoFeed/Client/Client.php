<?php

namespace PicoFeed\Client;

use GuzzleHttp\ClientInterface;
use PicoFeed\Logging\Logger;
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

        $response = $this->doRequest();
        if ($response) {
            if ($this->isPassthroughEnabled()) {
                echo $response->getBody()->getContents();
            };

            $this->handleResponse($response);
        }

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
}
