<?php


namespace PicoFeed\Filter;


class Attribute
{
    public $name = '';
    public $value = '';

    public function __construct($name, $value)
    {
        $this->name = $name;
        $this->value = $value;
    }
}