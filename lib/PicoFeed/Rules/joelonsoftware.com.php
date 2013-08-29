<?php
return array(
    'test_url' => 'http://www.joelonsoftware.com/items/2011/09/15.html',
    'strip' => array(
         '//h1[1]',
         '//h2[1]',
         '//div[@class=\"date\"]',
         '//div[@class=\"author\"]',
         '//blockquote[@class=\"textmessage\"]',
         '//div[@style=\"width:500px\"]/p[last()]',
         '//div[@style=\"width:500px\"]/p[last()-1]',
         '//div[@style=\"width:500px\"]/h4[last()]',
         '//div[@style=\"width:500px\"]/h4[last()-1]',
         '//div[@style=\"width:500px\"]/div[last()]',
    ),
);
