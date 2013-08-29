<?php
return array(
    'title' => '//meta[@name=\'DC.title\']/@content',
    'title' => '//div[contains(@class, \'cabecera_noticia\')]//h1',
    'test_url' => 'http://elpais.com/elpais/2012/02/06/gente/1328526783_491687.html',
    'test_url' => 'http://www.elpais.com/articulo/cultura/mano/retrato/materia/elpepicul/20120207elpepicul_2/Tes',
    'body' => array(
         '//div[@class=\'columna_texto\']',
         '//div[@id=\'cuerpo_noticia\']',
         '//div[@class=\'estructura_2col_1zq\']//div[@class=\'margen_n\']',
    ),
    'strip_id_or_class' => array(
         'disposicion_vertical',
         'ampliar_foto',
         'utilidades',
         'info_relacionada',
         'm-kiosko',
         'info_complementa',
    ),
    'strip' => array(
         '//div[starts-with(@id, \'sumario\') and contains(., \'más información\')]',
         '//div[@id=\'coment\' or @id=\'foros_not\']',
    ),
);
