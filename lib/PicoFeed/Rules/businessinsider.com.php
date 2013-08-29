<?php
return array(
    'title' => '//div[@class=\"sl-layout-post\"]/h1',
    'test_url' => 'http://www.businessinsider.com/microsoft-just-put-one-of-its-hardcore-technical-geniuses-on-xbox-2012-1',
    'body' => array(
         '//div[contains(@class, \'post-content\') or contains(@class, \'KonaBody\')]',
    ),
    'strip' => array(
         '//div[contains(@class, \"post-sidebar\")]',
         '//div[@id=\'related-links\']',
         '//*[contains(@class,\'sponsored-text\')]',
         '//div[@id=\'post_footer\']',
    ),
);
