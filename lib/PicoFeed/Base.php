<?php

namespace PicoFeed;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use PicoFeed\Config\Config;
use PicoFeed\Logging\Logger;

/**
 * Base class
 *
 * @package PicoFeed
 * @author  Frederic Guillot
 */
abstract class Base
{
    /**
     * Config class instance
     *
     * @access protected
     * @var \PicoFeed\Config\Config
     */
    protected $config;

    /**
     * Guzzle Http client used to make http requests
     *
     * @var ClientInterface
     */
    protected $httpClient;

    /**
     * Constructor.
     *
     * @param \PicoFeed\Config\Config $config Config class instance
     * @param ClientInterface $httpClient
     */
    public function __construct(Config $config = null, ClientInterface $httpClient = null)
    {
        $this->config = $config ?: new Config();
        $this->httpClient = $httpClient ?: new Client();
    }

    public function setConfig(Config $config) {
        $this->config = $config;
    }
}
