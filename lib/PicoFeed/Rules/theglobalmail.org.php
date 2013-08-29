<?php
return array(
    'title' => '//h1[@id=\"headline\"]',
    'test_url' => 'http://www.theglobalmail.org/feature/tiramisu-time-in-pyongyang/88/',
    'body' => array(
         '//div[@id=\"template\"]',
    ),
    'strip_id_or_class' => array(
         'editorial-byline-pic',
         'editorial-byline',
         'headline',
         'pullquote',
         'image-caption-content',
         'header',
         'footer',
         'searchContainer',
         'letter-text',
         'letter-from',
         'letter-date',
         'social-tab',
         'divider',
    ),
    'strip' => array(
         '/html/body/span[contains(@style, \"display: none\")]',
         '//div[contains(@class, \"searchInstruction\")]',
         '//div[contains(@class, \"searchResults\")]/h4',
    ),
);
