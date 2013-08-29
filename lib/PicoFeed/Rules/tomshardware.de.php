<?php
return array(
    'title' => '//h1[@id=\"header-news-title\" and @class=\"hardwareTitle\"][1]',
    'test_url' => 'http://www.tomshardware.de/DDR4-DDR3-ISSCC-Samsung-Hynix,news-247133.html',
    'body' => array(
         '//div[@id=\"news-content\"]/div[@id=\"intelliTXT\"][1]',
    ),
    'strip' => array(
         '//div[@id=\"news-content\"]/div[@id=\"intelliTXT\"]/table',
    ),
);
