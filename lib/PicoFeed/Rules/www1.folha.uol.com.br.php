<?php
return array(
    'title' => '//div[@id=\"articleNew\"]/h1',
    'test_url' => 'http://www1.folha.uol.com.br/mundo/1115805-ex-ditador-argentino-videla-e-condenado-a-50-anos-de-prisao.shtml',
    'body' => array(
         '//div[@id=\'articleNew\']',
    ),
    'strip' => array(
         '//div[@id=\'articleBy\']',
         '//div[@id=\'articleDate\']',
         '//td[@class=\'articleGraphicCredit\']',
         '//h1',
         '//div[@id=\'articleEnd\']',
         '//p[@class=\'tagline\']',
         '//div[@class=\'openBox adslibraryArticle\']',
    ),
    'strip_id_or_class' => array(
         'ad-180x150-1',
    ),
);
