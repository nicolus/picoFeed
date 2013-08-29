<?php
return array(
    'title' => '//div[contains(@class, \'storytitle\')]//h1',
    'test_url' => 'http://www.npr.org/blogs/thetwo-way/2011/07/12/137799301/sports-loses-its-escapist-gleam-in-a-summer-of-court-dates',
    'test_url' => 'http://www.npr.org/2012/07/04/156190948/feeling-under-siege-catholic-leadership-shifts-right',
    'test_url' => 'http://www.npr.org/2012/12/13/166480907/the-years-best-sci-fi-crosses-galaxies-and-genres',
    'body' => array(
         '//div[@id=\'storyspan02\']//*[@class=\'duration\' or @class=\'download\' or contains(@class, \'photo\')] | //div[@id=\'storytext\'] | //div[@class=\'transcript\']',
    ),
    'strip' => array(
         '//div[@class=\'enlarge_measure\']',
         '//div[@class=\'enlarge_html\']',
         '//a[@class=\'enlargeicon\']',
         '//div[contains(@class, \'bookedition\')]',
         '//div[@class=\'textsize\']',
         '//ul[@class=\'genres\']',
         '//span[@class=\'bull\']',
         '//h3[@class=\'conheader\']',
         '//div[@class=\"ecommercepop\"]',
         '//span[@class=\"bull\"]',
         '//span[@class=\"purchaseLink\"]',
         '//div[@class=\"enlarge_html\"]',
         '//div[@class=\"enlarge_measure\"]',
         '//div[@class=\"container con1col small\"]',
         '//a[contains(@class, \"enlargebtn\")]',
         '//div[contains(@class, \"bucketwrap internallink\")]',
    ),
    'strip_id_or_class' => array(
         'secondary',
         'con1col',
    ),
);
