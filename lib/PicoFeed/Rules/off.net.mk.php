<?php
return array(
    'test_url' => 'http://off.net.mk/zhivot-i-zabava/gadzheti/dzhabe-raboti-dzhabe-ne-dishi',
    'body' => array(
         '//div[(@id = \"content\")]',
    ),
    'strip' => array(
         '//div[(@class = \"links-bar\")]',
         '//div[(@class = \"povrzani\")]',
         '//div[(@class = \"povrzani-dolu\")]',
         '//div[(@class = \"tags\")]',
         '//h1[(@id = \"page-title\")]',
    ),
);
