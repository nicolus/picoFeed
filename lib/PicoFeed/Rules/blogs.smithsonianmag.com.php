<?php
return array(
    'test_url' => 'http://blogs.smithsonianmag.com/adventure/2011/10/tips-for-women-traveling-in-turkey/',
    'body' => array(
         '//div[@class = \'post\']',
    ),
    'strip' => array(
         '//div[@class = \'post\']/h3[@class = \'storytitle\']',
         '//div[@class = \'post\']/div[@class = \'social\']',
         '//img[@style = \'display:none;\']',
         '//img[@height=\'0\' and @width=\'0\']',
    ),
);
