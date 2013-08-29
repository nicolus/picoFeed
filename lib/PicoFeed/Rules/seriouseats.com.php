<?php
return array(
    'test_url' => 'http://www.seriouseats.com/recipes/2010/09/peking-duck-mandarin-pancakes-plum-sauce-recipe.html',
    'body' => array(
         '//div[@id=\'content\']',
    ),
    'strip' => array(
         '//h2[@class=\'fn\'] | //h2[@class=\'double-lined\'] | //h3 | //div[@id=\'threeColumn2\'] | //div[@id=\'threeColumn3\']',
    ),
    'strip_id_or_class' => array(
         '\"recipe-feedback\"',
         '\"comments\"',
         '\"procedure-number\"',
         '\"more-with-author\"',
         '\"inner\"',
    ),
);
