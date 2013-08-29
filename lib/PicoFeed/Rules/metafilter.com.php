<?php
return array(
    'test_url' => 'http://www.metafilter.com/128101/Probably-more-secure-than-the-Drafts-folder-on-a-shared-Gmail-account',
    'body' => array(
         '//div[contains(@class, \'copy\') or contains(@class, \'comments\')]',
    ),
    'strip_id_or_class' => array(
         'related',
    ),
    'strip' => array(
         '//a[. = \'Subscribe\']',
         '//h1/span[@class = \'smallcopy\']',
         '//a[@class = \'skip\']',
         '//div[@id = \'logo\']',
         '//div[contains(@class, \'comments\') and contains(., \'You are not currently logged in\')]',
    ),
);
