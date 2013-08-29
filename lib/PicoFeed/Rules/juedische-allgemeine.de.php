<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.juedische-allgemeine.de/article/view/id/13366',
    'body' => array(
         '//div[@id=\'article_container\']',
    ),
    'strip_id_or_class' => array(
         'share_toolbox',
         'article_header',
         'phototext',
    ),
    'strip' => array(
         '//img[@src=\'\']',
         '//h4[@id=\'author\']',
    ),
);
