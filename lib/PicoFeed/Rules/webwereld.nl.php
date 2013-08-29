<?php
return array(
    'test_url' => 'http://webwereld.nl/analyse/111452/de-code-van-dorifel-nader-bekeken.html',
    'strip' => array(
         '//*[@class=\"paginator\"]',
    ),
    'body' => array(
         '//*[@id=\"articleText\"]',
    ),
    'next_page_link' => array(
         '//a[@class=\"next\"]',
    ),
);
