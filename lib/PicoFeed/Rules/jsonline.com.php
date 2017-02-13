<?php

return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'http://www.jsonline.com/story/entertainment/music/2017/02/11/milwaukee-latino-youths-add-magic-grammy-nominated-album/97646200/?from=global&sessionKey=&autologin=',
            'body' => array(
                '//div[@itemprop="articleBody"]',
            ),
            'strip' => array(
                '//h1',
                '//iframe',
                '//[span[@class="mycapture-small-btn mycapture-btn-with-text mycapture-expandable-photo-btn-small js-mycapture-btn-small"]]',
                '//[div[@class="close-wrap"]]',
                '//div[contains(@class,"ui-video-wrapper")]',
                '//div[contains(@class,"media-mob")]',
                '//div[contains(@class,"left-mob")]',
                '//div[contains(@class,"nerdbox")]',
                '//div[contains(@class,"oembed-asset")]',
                '//[div[@class="mjs-credit"]]',
                '//[div[@class="mjs-byline"]]',
                '//*[contains(@class,"share")]',
                '//div[contains(@class,"gallery-asset")]',
                '//div[contains(@class,"oembed-asset")]',
                '//[div[@class="article-print-url"]]',
                '//[div[@class="mjs-footer"]]',
            ),
        ),
    ),
);

