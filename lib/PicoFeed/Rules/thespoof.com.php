<?php
return array(
    'title' => '//h1[contains(@class, \'cTitle\')]',
    'test_url' => 'http://www.thespoof.com/news/spoof.cfm?headline=s8i108389',
    'body' => array(
         '//div[contains(@class, \'KonaBody\') or @id=\'articleimageright\']',
    ),
);
