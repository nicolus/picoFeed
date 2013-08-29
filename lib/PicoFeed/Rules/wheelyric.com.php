<?php
return array(
    'test_url' => 'http://wheelyric.com/lyrics/121#2',
    'body' => array(
         '//div[contains(@class,\'oAndtLyrics\')]',
    ),
    'strip' => array(
         '//div[contains(@class,\'info\')]',
         '//div[contains(@id,\'romanization\')]',
         '//div[contains(@id,\'youtube\')]',
         '//div[contains(@id,\'romanizationSelector\')]',
         '//div[contains(@id,\'langSelectWrap\')]',
         '//div[contains(@id,\'requestTranslationWrap\')]',
         '//div[contains(@id,\'viewMore\')]',
         '//div[contains(@class,\'lyricsListInMainContent\')]',
         '//div[contains(@class,\'descIpNoti\')]',
    ),
);
