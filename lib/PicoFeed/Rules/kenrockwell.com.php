<?php
return array(
    'test_url' => 'http://www.kenrockwell.com/tech/composition.htm',
    'strip' => array(
         '//table[@align=\"right\"][@width=\"120\"]',
         '//a[.=\"Adorama\"]/parent::p[contains(., \"goodies\")]',
         '//a[.=\"Adorama\"]/parent::p[contains(., \"This free website\'s biggest source of\")]',
    ),
);
