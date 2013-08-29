<?php
return array(
    'title' => 'concat(//h1,\' - \',//h2,\' - \',//h3)',
    'test_url' => 'http://pitchfork.com/features/why-we-fight/8796-on-the-far-slope-of-the-uncanny-valley/',
    'body' => array(
         '//div[@id=\'main\']',
    ),
    'single_page_link' => array(
         '//link[@rel=\'canonical\']',
    ),
    'strip' => array(
         '//div[@class=\'info\']',
         '//li[@class=\'next\']',
         '//li[@class=\'prev\']',
    ),
    'strip_id_or_class' => array(
         '\'object-grid related-content\'',
         '\'object-prevnext\'',
         '\'object-header\'',
         '\'source\'',
         '\'label\'',
         '\'title\'',
    ),
);
