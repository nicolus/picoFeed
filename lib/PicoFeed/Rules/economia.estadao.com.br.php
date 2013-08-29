<?php
return array(
    'test_url' => 'http://economia.estadao.com.br/noticias/economia,cmn-aprova-r-67-bi-em-credito-para-20-setores-da-economia,118501,0.htm',
    'body' => array(
         '//div[@class=\"corpo\"]',
    ),
    'strip' => array(
         '//strong',
    ),
    'strip_id_or_class' => array(
         'bb-md-noticia-foto-autor',
         'bb-md-noticia-foto-bajada',
    ),
);
