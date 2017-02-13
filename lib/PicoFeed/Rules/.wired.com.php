<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.wired.com/gamelife/2013/09/ouya-free-the-games/',
            'body' => array(
                 '//div[starts-with(@class,"post")]',
            ),
            'strip' => array(
                '//nav',
                '//button',
                '//div[contains(@class,"show-ipad")]',
                '//img[contains(@id,"-hero-bg")]',
                '//div[@data-js="overlayWrap"]',
                '//ul[contains(@class,"metadata")]',
                '//div[contains(@id,"mobile-gallery-underlay")]',
                '//ul[contains(@class="metadata"]',
                '//div[@class="opening center"]',
                '//p[contains(@class="byline-mob"]',
                '//h1',
                '//div[@id="o-gallery"]',
                '//div[@data-js="mGallery"]',
                '//div[starts-with(@class,"sm-col")]',
                '//div[contains(@class,"pad-b-huge")]',
                '//a[contains(@class,"visually-hidden")]',
                '//span[contains(@class,"slide-count")]',
                '//*[@class="social"]',
                '//i',
                '//figure[starts-with(@class,"end-slate")]',
                '//div[contains(@class,"mob-gallery-launcher")]',
                '//div[@data-js="mobGalleryAd"]',
                '//div[contains(@class,"footer")]',
                '//div[contains(@data-js,"fader")]',
                '//div[@id="sharing"]',
                '//div[@id="related"]',
                '//div[@id="most-pop"]',
                '//ul[@id="article-tags"]',
                '//style',
                '//section[contains(@class,"footer")]'
            ),
        )
    )
);
