<?php
return array(
    'title' => '//h2',
    'test_url' => 'http://www.andyrutledge.com/hungry-for-a-better-menu.php',
    'body' => array(
         '//div[@class=\'copybody\']',
    ),
    'strip' => array(
         '//*[@class=\'space\']',
         '//*[@class=\'articleFoot\']',
    ),
);
