<?php
return array(
    'test_url' => 'http://www.spin.com/articles/bathlands-deep-heart-americas-new-drug-nightmare',
    'body' => array(
         '//section[contains(@class, \'main\')]',
    ),
    'strip' => array(
         '//footer',
         '//a[@class=\'paginated\']',
    ),
);
