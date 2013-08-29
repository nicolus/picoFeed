<?php
return array(
    'title' => '//title',
    'test_url' => 'http://triblive.com/sports/2819913-85/lemieux-deal-penguins-burkle-nhl-owners-team-mario-bettman-case',
    'strip' => array(
         '//h1[@class=\'vert_class\']',
         '//h1[@class=\'headline\']',
         '//img[contains(@src,\'logo_triblive.gif\')]',
    ),
    'single_page_link' => array(
         '//a[@class=\'stprint\']',
    ),
);
