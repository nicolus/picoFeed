<?php

namespace PicoFeed;

use RuntimeException;

/**
 * Base writer class
 *
 * @author  Frederic Guillot
 * @package picofeed
 */
abstract class Writer
{
    /**
     * Dom object
     *
     * @access protected
     * @var DomDocument
     */
    protected $dom;

    /**
     * Items
     *
     * @access public
     * @var array
     */
    public $items = array();

    /**
     * Generate the XML document
     *
     * @abstract
     * @access public
     * @param  string   $filename   Optional filename
     * @return string
     */
    abstract public function execute($filename = '');

    /**
     * Check required properties to generate the output
     *
     * @access public
     * @param  array     $properties    List of properties
     * @param  mixed     $container     Object or array container
     */
    public function checkRequiredProperties(array $properties, $container)
    {
        foreach ($properties as $property) {
            if ((is_object($container) && ! isset($container->$property)) || (is_array($container) && ! isset($container[$property]))) {
                throw new RuntimeException('Required property missing: '.$property);
            }
        }
    }
}
