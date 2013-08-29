<?php
return array(
    'title' => '//meta[@property=\'og:title\']/@content',
    'test_url' => 'http://www.independent.co.uk/news/world/middle-east/syria-could-face-human-rights-probe-2274326.html',
    'body' => array(
         '//div[contains(@class, \'articleContent\')]',
    ),
    'strip_id_or_class' => array(
         'RelatedArtTag',
    ),
);
