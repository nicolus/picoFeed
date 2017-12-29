<?php

namespace PicoFeed;

use GuzzleHttp\ClientInterface;
use PicoFeed\Client\Client;
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
     * @var ClientInterface Guzzle Http client used to make http requests
     */
    protected $httpClient;

    /**
     * @var Client Picofeed Http Client
     */
    protected $client;

    /**
     * Constructor.
     *
     * @param \PicoFeed\Config\Config $config Config class instance
     * @param ClientInterface $httpClient
     */
    public function __construct(Config $config = null, ClientInterface $httpClient = null)
    {
        $this->config = $config ?: new Config();
        $this->client = new Client($this->httpClient);
        Logger::setTimezone($this->config->getTimezone());
    }

    public function setConfig(Config $config) {
        $this->config = $config;
    }
}
