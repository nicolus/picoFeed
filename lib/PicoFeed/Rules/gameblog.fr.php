<?php
return array(
    'title' => '//meta[@property=\"og:title\"]/@content',
    'test_url' => 'http://www.gameblog.fr/news/26330-les-sims-3-showtime-s-annonce-en-video',
    'test_url' => 'http://www.gameblog.fr/news/26306-mise-a-jour-du-dashboard-de-la-xbox-360-disponible',
    'body' => array(
         '//div[@id=\'GBTVPlayer\'] | //div[contains(@class, \'col490\')]',
    ),
    'strip_id_or_class' => array(
         'noprint',
    ),
    'strip' => array(
         '//div[@id=\'gbNewsTextContent\']/following-sibling::*',
    ),
);
