<?php

namespace PicoFeed;

/**
 * Config class
 *
 * @author  Frederic Guillot
 * @package picofeed
 */
class Config
{
    /**
     * Contains all parameters
     *
     * @access private
     * @var array
     */
    private $container = array();

    /**
     * Magic method to have any kind of setters or getters
     *
     * @access public
     * @param  string   $name        Getter/Setter name
     * @param  array    $arguments   Method arguments
     * @return mixed
     */
    public function __call($name , array $arguments)
    {
        $name = strtolower($name);
        $prefix = substr($name, 0, 3);
        $parameter = substr($name, 3);

        if ($prefix === 'set' && isset($arguments[0])) {
            $this->container[$parameter] = $arguments[0];
            return $this;
        }
        else if ($prefix === 'get') {
            $default_value = isset($arguments[0]) ? $arguments[0] : null;
            return isset($this->container[$parameter]) ? $this->container[$parameter] : $default_value;
        }
    }
}
