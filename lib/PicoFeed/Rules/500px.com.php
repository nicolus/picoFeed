<?php
return array(
    'test_url' => 'http://500px.com/photo/3641041?from=editors',
    'strip' => array(
         '//span[contains(@id,\'copyright\')]',
         '//*[contains(@id,\'store\')]',
         '//*[contains(@id,\'user-info\')]',
         '//*[contains(@id,\'photo-stats\')]',
         '//*[contains(@id,\'voting_controls_container\')]',
         '//*[contains(@id,\'more-photos\')]',
         '//*[contains(@id,\'embed-photo\')]',
         '//*[contains(@class,\'col d3 clearafter\')]',
    ),
);
