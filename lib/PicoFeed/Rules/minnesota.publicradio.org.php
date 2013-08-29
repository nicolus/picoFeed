<?php
return array(
    'title' => '//*[@class=\"article\"]/h1',
    'test_url' => 'http://minnesota.publicradio.org/display/web/2012/06/19/health/senators-want-health-care-ruling-on-tv/',
    'strip' => array(
         '//*[@class=\"article\"]/h1',
         '//*[@class=\"article\"]/div[@class=\"date\"]',
         '//*[@class=\"article\"]/div[@class=\"date\"]/following-sibling::br',
    ),
);
