<?php
return array(
    'title' => '//span[@id=\'ctl00_ctl00_MainContent_MainContent_RecipeImage1_lblRecipeTitle\']',
    'test_url' => 'http://revistapiaui.estadao.com.br/edicao-62/carta-de-havana/la-vida-por-la-izquierda',
    'test_url' => 'http://economia.estadao.com.br/noticias/economia,pf-panamericano-tambem-irrigou-contas-de-executivos-do-grupo-silvio-santos,94648,0.htm',
    'body' => array(
         '//div[@class=\'img_article\'] | //div[@class=\'article\']//div[@class=\'article_header\' or @class=\'article_content\']',
         '//div[@class=\'texto-noticia\']',
    ),
    'strip_id_or_class' => array(
         'divulgar',
         'innerRight',
    ),
    'strip' => array(
         '//div[@class=\'size\' or @class=\'imprimir\']',
    ),
);
