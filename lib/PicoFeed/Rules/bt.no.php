<?php
return array(
    'title' => '//h1[contains(@class,\'articleTitle\')]',
    'test_url' => 'http://www.bt.no/meninger/debatt/Typisk-norsk-a-vare-god-nok-2884108.html',
    'body' => array(
         '//div[contains(@class,\'bodyText\')]',
    ),
    'strip_id_or_class' => array(
         '\'pull1\'',
         '\'relationArticle\'',
    ),
    'strip' => array(
         '//span[@class=\'quote\']',
         '//div[contains(@class,\'bodyText\')]/node()[last()-1]/self::h2',
    ),
);
