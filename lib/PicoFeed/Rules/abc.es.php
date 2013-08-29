<?php
return array(
    'title' => '//meta[@property=\'og:title\']/@content',
    'test_url' => 'http://www.abc.es/20120209/tv-series/abci-house-ultima-temporada-201202090936.html',
    'body' => array(
         '//div[@class=\'datosi\' or @class=\'date\' or @class=\'photo-alt1\' or @class=\'text\' or @itemprop=\'articleBody\']',
    ),
    'strip_id_or_class' => array(
         'colB',
    ),
);
