<?php
return array(
    'test_url' => 'http://macmagazine.com.br/2011/08/01/skype-para-ipad-esta-finalmente-chegando-a-app-store/',
    'strip' => array(
         '//*[(@class=\"slides_container\")]',
         '//div[(@id=\"slides_two\")]',
         '//span[(@class=\"secao\")]',
         '//div[(@id=\"idc-container\")]',
         '//div[(@id=\"idc-noscript\")]',
         '//div[(@class=\"linkwithin_div\")]',
         '//div[(@class=\"navPosts\")]',
         '//div[(@id=\"lateral\")]',
         '//div[(@id=\"autor\")]',
         '//div[(@id=\"rodape\")]',
         '//div[(@id=\"post\")]/h1',
         '//div[(@id=\"post\")]/div[(@id=\"boxInformacoes\")]',
    ),
);
