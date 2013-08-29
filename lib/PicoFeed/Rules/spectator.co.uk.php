<?php
return array(
    'test_url' => 'http://www.spectator.co.uk/arts-and-culture/night-and-day/7449683/spotify-sunday-my-personal-soundtrack.thtml',
    'body' => array(
         '/html/body/div[@id=\'wrapper\']/div[@id=\'main-content\']/div[@class=\'article_body\']',
    ),
    'strip' => array(
         '/html/body/div[@id=\'wrapper\']/div[@id=\'main-content\']/div[@class=\'article_body\']/h2 | /html/body/div[@id=\'wrapper\']/div[@id=\'main-content\']/div[@class=\'article_body\']/a[@class=\'author-link\']',
    ),
);
