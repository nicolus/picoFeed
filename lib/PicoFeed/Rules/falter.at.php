<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.falter.at/falter/2013/03/26/der-dandy-auf-der-sinkenden-galeere/',
    'body' => array(
         '//article[@class=\'spanMain\']',
    ),
    'strip_id_or_class' => array(
         '\'respond\'',
         '\'meta\'',
         '\'servicebox\'',
         '\'related\'',
         '\'twitter-share-button\'',
    ),
    'strip' => array(
         '//img[@src=\'http://www.falter.at/web/_pics/falterlogo_dblau.gif\']',
         '//br',
    ),
);
