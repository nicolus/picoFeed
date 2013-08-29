<?php
return array(
    'title' => '//div[@class=\"sl-layout-post\"]/h1',
    'test_url' => 'http://www.businessinsider.com/as-europe-booms-on-bailout-deal-john-boehner-just-confirmed-that-the-us-is-nowhere-2011-7',
    'body' => array(
         '//div[contains(@class, \'post-content\') or contains(@class, \'KonaBody\')]',
    ),
    'strip' => array(
         '//div[contains(@class, \"post-sidebar\")]',
         '//div[@id=\'related-links\']',
    ),
);
