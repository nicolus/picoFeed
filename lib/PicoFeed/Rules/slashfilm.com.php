<?php
return array(
    'title' => 'substring-before(//title,\'| /Film\')',
    'test_url' => 'http://www.slashfilm.com/superhero-bits-206/',
    'strip' => array(
         '//div[@class=\'pm-left\']',
         '//div[@class=\'pm-right\']',
         '//h2/span',
         '//h2/strong/a',
         '//p[contains(text(),\'we have to split this post over\')]',
         '//p[@class=\'post-info\']',
         '//h1/a',
         '//img[contains(@src,\'siteimages/authors\')]',
         '//div[@id=\'header\']',
         '//div[@class=\'topad-right\']',
         '//strong[contains(text(),\'Cool Posts From Around the Web:\')]',
    ),
    'next_page_link' => array(
         '//h2/strong/a',
    ),
);
