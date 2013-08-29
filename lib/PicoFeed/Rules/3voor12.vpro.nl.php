<?php
return array(
    'title' => '//div[@class=\'intro\']/h1',
    'test_url' => 'http://3voor12.vpro.nl/nieuws/2012/januari/Ook-website-GroenLinks-woensdag-op-zwart-i-v-m--SOPA.html',
    'body' => array(
         '//div[@id=\'main\']',
    ),
    'strip' => array(
         '//div[@class=\'share\']',
         '//*[@class=\'zoom\']',
         '//div[@id=\'disqus_thread\']',
    ),
);
