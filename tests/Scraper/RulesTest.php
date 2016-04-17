<?php

namespace PicoFeed\Scraper;

use PHPUnit_Framework_TestCase;

class RulesTest extends PHPUnit_Framework_TestCase
{
    public function testThatRulesAreValid()
    {
        foreach (glob(__DIR__.'/../../lib/PicoFeed/Rules/.*.php') as $filename) {
            $this->assertInternalType('array', include($filename), 'Rule invalid: '.$filename);
        }

        foreach (glob(__DIR__.'/../../lib/PicoFeed/Rules/*.php') as $filename) {
            $this->assertInternalType('array', include($filename), 'Rule invalid: '.$filename);
        }
    }
}
