<?php
return array(
    'title' => '//h1[@class=\"Headline\"]',
    'test_url' => 'http://www.theindychannel.com/news/31050840/detail.html',
    'body' => array(
         '//div[@class=\"storyBody\"]',
    ),
    'strip' => array(
         '//td[@class=\"AssocContentTD\"]',
         '//div[@id=\"pageTitle\"]',
         '//div[@class=\"posted\"]',
         '//div[@class=\"updated\"]',
         '//div[@class=\"js-kit-disclaimer\"]',
         '//table[@class=\"row3table\"]',
         '//div[@class=\"container2\"]',
         '//div[@id=\"delta\"]',
    ),
);
