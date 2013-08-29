<?php
return array(
    'title' => '//h1[@class=\'entry-title\']',
    'test_url' => 'http://www.philly.com/philly/sports/eagles/20120127_Ohio_State_s_Posey_didn_t_waste_time_lost_to_suspension.html',
    'body' => array(
         '//@id=\'body-content\'',
    ),
    'strip' => array(
         '//@class=b-group',
         '//*[contains(@style, \'none\')]',
         '//a[contains(@href, \'comments\')]',
         '//*[contains(@class, \'comment\')]',
    ),
);
