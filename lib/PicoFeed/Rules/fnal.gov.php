<?php
return array(
    'title' => 'normalize(//h1)',
    'test_url' => 'http://www.fnal.gov/pub/today/archive_2011/today11-11-09_MuonDepartmentReadMore.html',
    'body' => array(
         '/table/tbody/tr[5]//table/tbody//table/tbody/tr/td',
    ),
    'strip' => array(
         '//h1',
         '//p[position()=last()]/em',
         '//p[position()=last()]/child::text()',
    ),
);
