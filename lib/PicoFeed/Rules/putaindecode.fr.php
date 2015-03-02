<?php
return array(
    'test_url' => 'http://putaindecode.fr/posts/js/etat-lieux-js-modulaire-front/',
    'body' => array(
        '//[@class="putainde-Post-md"]'
    ),
    'strip' => array(
        '//script',
        '//*[contains(@class, "inlineimg")]',
        '//*[contains(@class, "comment-respond")]',
        '//header'
    )
);
