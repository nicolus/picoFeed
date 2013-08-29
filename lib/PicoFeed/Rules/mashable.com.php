<?php
return array(
    'title' => '//h1[@class=\'title\']',
    'test_url' => 'http://mashable.com/2013/05/24/myspace-architects-rebuilding-a-brand/',
    'body' => array(
         '//article',
    ),
    'strip' => array(
         '//div[@class=\'ytm-gallery-box\']',
         '//div[contains(@class, \'adsense\')]',
         '//aside[contains(@class, \'social\')]',
    ),
    'strip_id_or_class' => array(
         'article-topics',
    ),
);
