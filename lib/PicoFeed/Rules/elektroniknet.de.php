<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.elektroniknet.de/automotive/technik-know-how/sicherheitselektronik/article/87717/0/Besser_als_die_Wirklichkeit/',
    'single_page_link' => array(
         '//a[contains(@href, \'?type=99\')]',
    ),
    'strip_id_or_class' => array(
         'anzeige',
         'top_page_navigation',
         'cr_image_container',
         'cr_image_reference',
         'cr_image_icon',
         '_close_txt',
         '_close_ico',
         'clearer',
    ),
    'strip' => array(
         '//h1',
         '//h6',
         '//div[contains(@id, \'plista\')]',
         '//img[contains(@id,\'tiny\')]',
         '//img[@class=\'cr_image\']',
         '//p[@style=\'font-size: 10px;\']',
    ),
);
