<?php
return array(
    'title' => 'substring-after(substring-after(//title,\':\'),\':\')',
    'test_url' => 'http://www.neh.gov/news/humanities/2011-11/IslamicScholar.html',
    'strip' => array(
         '//table[@class = \'marginpaddingTop\']',
         '//h2[@class = \'subHead\']',
    ),
);
