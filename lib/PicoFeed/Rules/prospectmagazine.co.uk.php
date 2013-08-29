<?php
return array(
    'test_url' => 'http://www.prospectmagazine.co.uk/2011/07/postmodernism-is-dead-va-exhibition-age-of-authenticism/',
    'body' => array(
         '//div[@class = \'entry\' or @class=\'standfirst\' or @class=\'lead_image\']',
    ),
    'strip_id_or_class' => array(
         'login-status',
         'shareinpost',
         'content_subscribe',
         'postinfo',
         'postutils',
         'comments',
    ),
    'strip' => array(
         '//strong[string(.) = \'Follow Prospect on Twitter\']',
    ),
);
