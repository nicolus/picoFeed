<?php
return array(
    'test_url' => 'http://www.grantland.com/story/_/id/8421241/examining-new-albums-rock-veterans-no-doubt-green-day',
    'strip' => array(
         '//a[text()=\'Grantland\']',
         '//li[@class=\'print\']',
         '//cite',
         '//a[contains(text(), \'[+]\')]',
         '//a[@id=\'jump-nav-link\']',
         '//h1[text()=\'Share This\']',
         '//h1[text()=\'Top Stories\']',
         '//div[@id=\"update-text-size\"]',
    ),
    'strip_id_or_class' => array(
         'ad-wrapper',
         'fb-connect-link',
         'fb-status',
    ),
);
