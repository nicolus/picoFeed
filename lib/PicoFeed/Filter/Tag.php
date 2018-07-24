<?php


namespace PicoFeed\Filter;


class Tag
{
    public $name = '';
    /** @var Attribute[] */
    public $attributes = [];

    public function __construct(string $name, array $attributes = [])
    {
        $this->name = $name;
        foreach ($attributes as $attribute => $value) {
            $this->attributes[] = New Attribute($attribute, $value);

        }
    }
}