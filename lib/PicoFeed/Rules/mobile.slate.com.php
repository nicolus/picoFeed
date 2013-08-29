<?php
return array(
    'title' => '//h2[@class=\"article_title\"]',
    'test_url' => 'http://mobile.slate.com/rss.jsp?rssid=411&item=http%3a%2f%2fwww.slate.com%2fdefault.aspx%3fdisplaymode%3d201%26id%3d2293749%26device%3drss',
    'strip' => array(
         '//a[@class=\"houseAdLink\"]',
         '//h1',
         '//div[@class=\"more_articles\"]',
    ),
);
