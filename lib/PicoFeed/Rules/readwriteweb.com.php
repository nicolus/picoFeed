<?php
return array(
    'title' => '//h1[@class=\"titlelink\"]',
    'test_url' => 'http://www.readwriteweb.com/archives/why_facebook_terrifies_google.php',
    'body' => array(
         '//div[@class=\"asset-content\"]',
    ),
    'strip_id_or_class' => array(
         'related-entries',
         'like-and-retweet',
    ),
);
