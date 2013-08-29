<?php
return array(
    'title' => '//h3',
    'test_url' => 'http://www.nzz.ch/wissen/wissenschaft/sonnenschutz-fuer-die-erde-1.17282213',
    'body' => array(
         '//*[@class=\'article-full\']',
    ),
    'strip' => array(
         '//header[@class=\'group\']',
         '//div[@id=\'social-media-floater\']',
         '//div[@class=\'advertisement\']',
         '//div[@class=\'infobox\']',
         '//div[@id=\'articleComments\']',
    ),
);
