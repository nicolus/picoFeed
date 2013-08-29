<?php
return array(
    'title' => 'concat(\"Video: \", //div[@id=\'currentVideoTitleDivId\'])',
    'test_url' => 'http://video.forbes.com/fvn/business/wells-fargo-inside-the-bank-that-works',
    'body' => array(
         '//div[@id=\'currentVideoDescriptionId\']',
    ),
);
