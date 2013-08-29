<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.prb.org/Journalists/Webcasts/2011/military-families.aspx',
    'body' => array(
         '//div[@id=\"featuredlinksbox\"]',
    ),
    'strip' => array(
         '//div[@class=\"relatedbox\"]',
         '//h1',
         '//br',
    ),
);
