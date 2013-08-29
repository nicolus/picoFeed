<?php
return array(
    'title' => '//h3[@class = \'article_title\']',
    'test_url' => 'http://www.bostonreview.net/BR36.4/megan_pugh_agnes_de_mille_dance.php',
    'body' => array(
         '//div[@id = \'center_column_article\']',
    ),
    'strip_id_or_class' => array(
         'article_title',
         'article_date',
         'article_author',
         'pull_quote',
    ),
);
