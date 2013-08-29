<?php
return array(
    'title' => '//h1[@class=\"articleHeadline\"]',
    'test_url' => 'http://www.nytimes.com/2011/07/24/books/review/an-academic-authors-unintentional-masterpiece.html',
    'test_url' => 'http://www.nytimes.com/2012/06/10/arts/television/the-newsroom-aaron-sorkins-return-to-tv.html',
    'test_url' => 'http://www.nytimes.com/2013/03/25/world/middleeast/israeli-military-responds-after-patrols-come-under-fire-from-syria.html',
    'body' => array(
         '//div[@id=\"article\"]',
    ),
    'strip_id_or_class' => array(
         'articleTools',
         'readerscomment',
         'enlargeThis',
         'pageLinks',
         'memberTools',
         'articleExtras',
         'singleAd',
         'byline',
         'dateline',
         'articleheadline',
         'articleBottomExtra',
         'shareTools',
    ),
    'strip' => array(
         '//div[contains(@class, \"doubleRule\")]',
         '//div[contains(@class, \"articleInline\")]//h6',
         '//a[contains(@href, \'nytimes.com/adx/\')]',
         '//nyt_byline',
         '//span[contains(@class, \'slideshow\') or contains(@class, \'video\')]',
         '//p[@class=\'caption\']//a[contains(., \'More Photos\')]',
         '//ul[@id = \'toolsList\']',
         '//h6[@class = \'kicker\']',
    ),
    'single_page_link' => array(
         '//link[contains(@href, \'pagewanted=all\')]',
    ),
);
