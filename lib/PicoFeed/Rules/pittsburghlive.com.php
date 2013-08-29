<?php
return array(
    'title' => 'substring-before(//title,\'- Pittsburgh Tribune\')',
    'test_url' => 'http://www.pittsburghlive.com/x/pittsburghtrib/sports/columnists/s_785654.html',
    'body' => array(
         '//div[@id=\'storyBody\']',
    ),
    'strip' => array(
         '//div[@class=\'morestories\']',
    ),
);
