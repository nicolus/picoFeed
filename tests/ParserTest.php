<?php

require_once 'lib/PicoFeed/Parser.php';
require_once 'lib/PicoFeed/Parsers/Rss20.php';

use PicoFeed\Parser;
use PicoFeed\Parsers\Rss20;

class ParserTest extends PHPUnit_Framework_TestCase
{
    public function testParseDate()
    {
        $parser = new Rss20('');

        $this->assertEquals(1363007161, $parser->parseDate('2013-03-11T09:06:01+00:00'));
        $this->assertEquals(1363767390, $parser->parseDate('2013-03-20T04:16:30+00:00'));
        $this->assertEquals(1359084183, $parser->parseDate('Thu, 24 Jan 2013 22:23:03 +0000'));
        $this->assertEquals(1380954899, $parser->parseDate('Sat, 04 Oct 2013 02:34:59 +0300'));
        $this->assertEquals(1054647561, $parser->parseDate('Tue, 03 Jun 2003 09:39:21 GMT'));
        $this->assertEquals(1071358202, $parser->parseDate('2003-12-13T18:30:02Z'));
        $this->assertEquals(1364252797, $parser->parseDate('Mon, 25 Mar 2013 19:06:37 +0100'));
        $this->assertEquals(1360072941, $parser->parseDate('2013-02-05T09:02:21.880-08:00'));
        $this->assertEquals('2012-01-31', date('Y-m-d', $parser->parseDate('01.31.2012')));
        $this->assertEquals('2012-01-31', date('Y-m-d', $parser->parseDate('01/31/2012')));
        $this->assertEquals('2012-01-31', date('Y-m-d', $parser->parseDate('2012-01-31')));
        $this->assertEquals('2010-02-24', date('Y-m-d', $parser->parseDate('2010-02-245T15:27:52Z')));
        $this->assertEquals('2010-08-20', date('Y-m-d', $parser->parseDate('2010-08-20Thh:08:ssZ')));
        $this->assertEquals(1288662457, $parser->parseDate('Mon, 01 Nov 2010 21:47:37 UT'));
        $this->assertEquals(1346084015, $parser->parseDate('Mon Aug 27 2012 12:13:35 GMT-0700 (PDT)'));
        $this->assertEquals(time(), $parser->parseDate('Tue, 3 Febuary 2010 00:00:00 IST'));
        $this->assertEquals(time(), $parser->parseDate('############# EST'));
        $this->assertEquals(time(), $parser->parseDate('Wed, 30 Nov -0001 00:00:00 +0000'));
        $this->assertEquals(time(), $parser->parseDate('čet, 24 maj 2012 00:00:00'));
        $this->assertEquals(time(), $parser->parseDate('-0-0T::Z'));
        $this->assertEquals(time(), $parser->parseDate('Wed, 18 2012'));
        $this->assertEquals(time(), $parser->parseDate("'2009-09-30 CDT16:09:54"));
        $this->assertEquals(time(), $parser->parseDate('ary 8 Jan 2013 00:00:00 GMT'));
        $this->assertEquals(time(), $parser->parseDate('Sat, 11 00:00:01 GMT'));
        $this->assertEquals(1370646143, $parser->parseDate('Fri Jun 07 2013 19:02:23 GMT+0000 (UTC)'));
        $this->assertEquals(1377426625, $parser->parseDate('25/08/2013 06:30:25 م'));
        $this->assertEquals(time(), $parser->parseDate('+0400'));
    }
}
