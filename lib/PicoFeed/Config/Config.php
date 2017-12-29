<?php

namespace PicoFeed\Config;

/**
 * Config class.
 *
 * @author  Frederic Guillot
 *
 * @method  Config setAdditionalCurlOptions(array $options)
 * @method  Config setClientTimeout(integer $value)
 * @method  Config setClientUserAgent(string $value)
 * @method  Config setMaxRedirections(integer $value)
 * @method  Config setMaxRecursions(integer $value)
 * @method  Config setMaxBodySize(integer $value)
 * @method  Config setProxyHostname(string $value)
 * @method  Config setProxyPort(integer $value)
 * @method  Config setProxyUsername(string $value)
 * @method  Config setProxyPassword(string $value)
 * @method  Config setGrabberRulesFolder(string $value)
 * @method  Config setGrabberTimeout(integer $value)
 * @method  Config setGrabberUserAgent(string $value)
 * @method  Config setParserHashAlgo(string $value)
 * @method  Config setContentFiltering(boolean $value)
 * @method  Config setTimezone(string $value)
 * @method  Config setFilterIframeWhitelist(array $value)
 * @method  Config setFilterIntegerAttributes(array $value)
 * @method  Config setFilterAttributeOverrides(array $value)
 * @method  Config setFilterRequiredAttributes(array $value)
 * @method  Config setFilterMediaBlacklist(array $value)
 * @method  Config setFilterMediaAttributes(array $value)
 * @method  Config setFilterSchemeWhitelist(array $value)
 * @method  Config setFilterWhitelistedTags(array $value)
 * @method  Config setFilterBlacklistedTags(array $value)
 * @method  Config setFilterImageProxyUrl($value)
 * @method  Config setFilterImageProxyCallback($closure)
 * @method  Config setFilterImageProxyProtocol($value)
 * @method  integer    getClientTimeout()
 * @method  string     getClientUserAgent()
 * @method  integer    getMaxRedirections()
 * @method  integer    getMaxRecursions()
 * @method  integer    getMaxBodySize()
 * @method  string     getProxyHostname()
 * @method  integer    getProxyPort()
 * @method  string     getProxyUsername()
 * @method  string     getProxyPassword()
 * @method  string     getGrabberRulesFolder()
 * @method  integer    getGrabberTimeout()
 * @method  string     getGrabberUserAgent()
 * @method  string     getParserHashAlgo()
 * @method  boolean    getContentFiltering(bool $default_value)
 * @method  string     getTimezone()
 * @method  array      getFilterIframeWhitelist(array $default_value)
 * @method  array      getFilterIntegerAttributes(array $default_value)
 * @method  array      getFilterAttributeOverrides(array $default_value)
 * @method  array      getFilterRequiredAttributes(array $default_value)
 * @method  array      getFilterMediaBlacklist(array $default_value)
 * @method  array      getFilterMediaAttributes(array $default_value)
 * @method  array      getFilterSchemeWhitelist(array $default_value)
 * @method  array      getFilterWhitelistedTags(array $default_value)
 * @method  array      getFilterBlacklistedTags(array $default_value)
 * @method  string     getFilterImageProxyUrl()
 * @method  \Closure   getFilterImageProxyCallback()
 * @method  string     getFilterImageProxyProtocol()
 * @method  array      getAdditionalCurlOptions()
 */
class Config
{
    /**
     * Contains all parameters.
     *
     * @var array
     */
    private $container = array();

    /**
     * Magic method to have any kind of setters or getters.
     *
     * @param string $name      Getter/Setter name
     * @param array  $arguments Method arguments
     *
     * @return mixed
     */
    public function __call($name, array $arguments)
    {
        $name = strtolower($name);
        $prefix = substr($name, 0, 3);
        $parameter = substr($name, 3);

        if ($prefix === 'set' && isset($arguments[0])) {
            $this->container[$parameter] = $arguments[0];

            return $this;
        } elseif ($prefix === 'get') {
            $default_value = isset($arguments[0]) ? $arguments[0] : null;

            return isset($this->container[$parameter]) ? $this->container[$parameter] : $default_value;
        }

        return null;
    }
}
