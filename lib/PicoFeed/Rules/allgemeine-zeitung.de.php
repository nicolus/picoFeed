<?php

return array(
    'test_url' => 'http://www.allgemeine-zeitung.de/lokales/polizei/zweimal-totalschaden-nach-unfaellen-auf-eisglatten-fahrbahnen-bei-mainz-und-bei-bad-sobernheim-mit-baeumen-kollidiert_14904737.htm',
    'body' => array(
        '//div[contains(@class, "article")][1]',
    ),
    'strip' => array(
        '//read/h1',
        '//*[contains(@class, "adsense")]',
        '//*[contains(@class, "linkbox")]',
        '//*[contains(@class, "info")]',
        '//*[@class="skip"]',
        '//*[@class="funcs"]',
        '//a[contains(@href, "abo-und-services")]'
    )
);
