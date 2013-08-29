<?php
return array(
    'test_url' => 'http://www.foxnews.com/entertainment/2011/05/04/dwayne-johnson-guys-grow-pair-driving-hybrid/',
    'strip' => array(
         '//p[contains(@class, \'contributor vcard\')]',
         '//p[a[contains(., \'Click here to read more on this story \')]]',
    ),
);
