<?php
return array(
    'title' => 'substring-before(//title, \' &ndash; \')',
    'test_url' => 'http://thecarton.net/2012/12/20/imdb',
    'strip' => array(
         '//header',
         '//div[@id=\'prev_next\']',
         '//div[@id=\'masthead\']',
    ),
);
