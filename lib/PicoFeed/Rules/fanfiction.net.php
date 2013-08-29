<?php
return array(
    'test_url' => 'http://www.fanfiction.net/s/6497403/1/Spartan_Love',
    'body' => array(
         '//*[@id = \'story text\']',
    ),
    'next_page_link' => array(
         'substring-after(//input[contains(@value, \'Next\')]/@onclick, \"self.location=\'\")',
    ),
    'strip_id_or_class' => array(
         '\'a2a_kit\'',
    ),
);
