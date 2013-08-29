<?php
return array(
    'test_url' => 'http://hypebeast.com/2012/11/stussy-2012-fall-winter-november-releases/',
    'body' => array(
         '//div[@id=\'content\']//div[contains(@class, \'wp-image-\') or contains(@class, \'entry\')][1]',
    ),
    'strip_id_or_class' => array(
         'disqus',
         'paginator',
         'photo-number',
    ),
);
