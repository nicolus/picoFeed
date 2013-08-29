<?php
return array(
    'title' => '//meta[@name=\'DC.title\']/@content',
    'test_url' => 'http://economia.elpais.com/economia/2012/02/07/actualidad/1328611790_342868.html',
    'test_url' => 'http://internacional.elpais.com/internacional/2012/02/07/actualidad/1328602145_448315.html',
    'body' => array(
         '//div[@class=\'columna_texto\']',
         '//div[@id=\'cuerpo_noticia\']',
    ),
    'strip_id_or_class' => array(
         'disposicion_vertical',
         'ampliar_foto',
    ),
    'strip' => array(
         '//div[starts-with(@id, \'sumario\') and contains(., \'más información\')]',
    ),
);
