<?php
return array(
    'test_url' => 'http://lifehacker.com/5925801/how-can-i-turn-vague-goals-into-actionable-to+dos',
    'test_url' => 'http://lifehacker.com/5941600/hack-an-old-computer-mouse-into-a-wireless-bluetooth-mouse',
    'strip' => array(
         '//span[@class=\"date\"]',
         '//*[(@class=\"presence_control_external smalltype\")]',
         '//div[@class=\"nodebyline modfont\"]',
         '//div[@id=\"rightwrapper\"]',
         '//div[@id=\'printhead\']/h1',
         '//div[@id=\'agegate_IDHERE\']',
         '//*[(@class=\"permalink_ads\")]',
         '//div[@id=\'wrapper\']/div[2][@class=\'postmeta_permalink_wrapper\']/div[1][@class=\'postmeta_permalink\']/div[2][@class=\'pm_line\']',
         '//div[@id=\'wrapper\']/div[1][@class=\'content permalink\']/p[6][@class=\'contactinfo\']',
         '//p[@class=\"arrow\"]',
         '//img[@alt=\"track\"]',
    ),
);
