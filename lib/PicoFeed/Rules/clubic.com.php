<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.clubic.com/carte-graphique/carte-graphique-amd/radeon-hd-7770/article-478936-1-radeon-hd-7750-7770.html',
    'body' => array(
         '//div[@class=\'editorial\']',
    ),
    'next_page_link' => array(
         '//a[contains(text(),\'Page suivante\')]',
    ),
    'strip' => array(
         '//a[contains(text(),\'Page suivante\')]',
         '//a[contains(text(),\'Page précédente\')]',
    ),
    'strip_id_or_class' => array(
         'slideshow',
    ),
);
