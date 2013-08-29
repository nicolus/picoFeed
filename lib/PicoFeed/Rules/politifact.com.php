<?php
return array(
    'test_url' => 'http://www.politifact.com/truth-o-meter/statements/2011/may/30/barbara-boxer/barbara-boxer-says-medicare-overhead-far-lower-pri/',
    'body' => array(
         '//div[@id=\"content\"]',
    ),
    'strip' => array(
         '//div[@class=\"pfcontentmid\"]/div[position()>4]|//div[@class=\"pfad\"]',
    ),
);
