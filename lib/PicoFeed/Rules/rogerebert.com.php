<?php
return array(
    'title' => 'substring-before(//title,\':\')',
    'test_url' => 'http://rogerebert.com/apps/pbcs.dll/article?AID=/20120411/REVIEWS/120419998/1005/GLOSSARY',
    'body' => array(
         '//div[@class=\'text\']',
    ),
    'strip' => array(
         '//a[contains(@href,\'printart\')]',
    ),
    'strip_id_or_class' => array(
         'enlarge_photo',
    ),
);
