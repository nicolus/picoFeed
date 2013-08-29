<?php
return array(
    'title' => '//meta[@property=\'og:title\']/@content',
    'test_url' => 'http://www.aachener-zeitung.de/sixcms/detail.php?template=az_detail&id=2552718',
    'body' => array(
         '//*[@class=\'fliesstext_detail\' or @class=\'detail_fliesstext\'] | //img[@itemprop=\"image\" and starts-with(@src, \"/sixcms/media.php/\")]',
    ),
    'strip_id_or_class' => array(
         'socialshareprivacy1',
         'zvaFacebookButton',
    ),
);
