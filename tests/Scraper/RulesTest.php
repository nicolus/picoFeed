<?php

namespace PicoFeed\Scraper;

use PHPUnit\Framework\TestCase;

class RulesTest extends TestCase
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
