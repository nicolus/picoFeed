<?php
return array(
    'test_url' => 'http://healthland.time.com/2011/07/24/amy-winehouse-and-the-pain-of-addiction/?preview=true&preview_id=39210&preview_nonce=0777d4e408',
    'body' => array(
         '//div[starts-with(@id, \'post-\')]//div[@class = \'entry-content\']',
    ),
    'strip' => array(
         '//div[@class=\'more-ways\']',
         '//div[@id = \'stayConnected\']',
         '//p[child::a[@rel = \'bookmark\']]',
         '//p[starts-with(string(.),\'(MORE:\')]',
         '//p[starts-with(string(.),\'(PHOTOS:\')]',
    ),
);
