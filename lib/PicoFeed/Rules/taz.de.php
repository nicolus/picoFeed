<?php
return array(
    'title' => 'concat(//div[@class=\'sectbody\']/h4,\': \',//div[@class=\'sectbody\']/h1)',
    'test_url' => 'http://www.taz.de/Protestbewegung-Occupy/!80188/',
    'body' => array(
         '//div[@class=\'sectbody\']',
    ),
    'strip' => array(
         '//p[@class=\'caption\']',
    ),
    'strip_id_or_class' => array(
         'rack',
    ),
);
