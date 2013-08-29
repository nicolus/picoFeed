<?php
return array(
    'title' => '//*[@itemprop=\'headline\']',
    'test_url' => 'http://www.essentialpublicradio.org/story/2011-11-14/volunteers-sought-federal-tax-assistance-program-pennsylvania-9421',
    'body' => array(
         '//*[@itemprop=\'articleBody\']',
    ),
    'strip' => array(
         '//*[contains(@class, \'instapaper_ignore\')]',
    ),
);
