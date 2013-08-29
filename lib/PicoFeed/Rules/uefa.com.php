<?php
return array(
    'test_url' => 'http://www.uefa.com/uefaeuropaleague/news/newsid=1617320.html',
    'body' => array(
         '//div[@class=\'d3cmsCBody\']//div[@class=\'pubText pubDate\' or @class=\'newsComment\' or contains(@class, \'newsPhoto\') or @class=\'newsText\']',
    ),
    'strip' => array(
         '//div[contains(@class, \'mpindex\')]',
    ),
);
