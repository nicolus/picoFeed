<?php

return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://feedproxy.google.com/~r/AllDiscovermagazinecomContent/~3/ZE_PjneHwZs/',
            'body' => array(
            '//div[@class="contentWell"]',
            ),
            'strip' => array(
            '//h1',
            'div[@class="breadcrumbs"]',
            'div[@class="fromIssue"]',
            'div[contains(@class, "belowDeck")]',
            'h1',
            'div[@class="meta"]',
            'div[@class="shareIcons"]',
            'div[@class="categories"]',
            'div[@class="navigation"]',
            'div[@class="heading"]',
            'div[contains(@id,"-ad")]',
            'div[@class="relatedArticles"]'
            ),
         ),
    ),
);
