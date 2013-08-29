<?php
return array(
    'test_url' => 'http://www.pcmag.com/article2/0,2817,2401676,00.asp',
    'body' => array(
         '//div[contains(@id,\'content\')]',
    ),
    'next_page_link' => array(
         '//a[contains(.,\'Next >\')]',
    ),
    'strip_id_or_class' => array(
         'sponsors',
    ),
);
