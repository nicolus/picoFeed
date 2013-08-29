<?php
return array(
    'title' => '//h1',
    'title' => '//h2',
    'test_url' => 'http://www.menshealth.com/mhlists/pursuit_of_happiness/index.php',
    'strip_id_or_class' => array(
         'morefromcat',
         'mostpopular',
         'articlepagination',
         'toolbar',
    ),
    'body' => array(
         '//div[@id=\'zmodcontent\']',
    ),
    'single_page_link' => array(
         '//li[@class=\'onepage\'] //a[contains (@href, \'printer.php\')]',
    ),
);
