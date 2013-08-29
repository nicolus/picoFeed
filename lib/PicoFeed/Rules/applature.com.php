<?php
return array(
    'title' => '//h1[contains(@class, \'title\')#',
    'test_url' => 'http://applature.com/mining-jobs/jobs/nickel-west-leinster-analytical-laboratory-technician/',
    'body' => array(
         '//div[@id=\'mainContent\']//div[contains(@class, \'section_content\')] | //ul[@class=\'section_footer\']',
    ),
    'strip_id_or_class' => array(
         'sharethis',
         'stats',
         'apply_form',
         'job_map',
         'respond',
    ),
    'strip' => array(
         '//h1//span[@class=\'type\']',
         '//li[@class=\'print\' or @class=\'map\']',
    ),
);
