<?php
return array(
    'title' => '//h1[@class=\"entry-title\"]',
    'test_url' => 'http://www.publico.pt/politica/noticia/passos-diz-que-se-limitacao-de-mandatos-fosse-para-todos-os-concelhos-estaria-claro-na-lei-1577691',
    'body' => array(
         '//article[@itemtype=\"http://schema.org/Article\"]',
    ),
    'strip' => array(
         '//header[@class=\"entry-header single-header\"]',
         '//aside[@class=\"entry-assets\"]',
         '//div[@class=\"entry-options entry-options-above group\"]',
         '//div[@class=\"entry-options entry-options-below group\"]',
    ),
);
