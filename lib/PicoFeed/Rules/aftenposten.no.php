<?php
return array(
    'title' => '//h1[@class=\'articleTitle \']',
    'test_url' => 'https://www.aftenposten.no/meninger/spaltister/Portrett-av-scenekunstneren-som-ung-mann-7167959.html',
    'body' => array(
         '//div[@class=\'bodyText widget storyContent\']',
    ),
    'strip' => array(
         '//p/span[@class=\'quote\']/..',
    ),
    'strip_id_or_class' => array(
         '\'pull1\'',
    ),
);
