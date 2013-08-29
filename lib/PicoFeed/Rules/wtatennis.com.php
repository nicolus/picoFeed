<?php
return array(
    'title' => '//h1[contains(@class, \'header-2\')]',
    'test_url' => 'http://www.wtatennis.com/news/article/3190914',
    'test_url' => 'http://www.wtatennis.com/news/article/3190244',
    'body' => array(
         '//article//*[contains(@class, \'teaserText\') or contains(@class, \'lastUpdated\') or contains(@class, \'image\') or contains(@class, \'body\')]',
    ),
    'strip_id_or_class' => array(
         'articleIndex',
    ),
);
