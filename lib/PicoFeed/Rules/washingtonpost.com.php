<?php
return array(
    'title' => '//meta[@name=\'title\']/@content',
    'test_url' => 'http://www.washingtonpost.com/world/europe/in-europe-new-fears-of-german-might/2011/10/19/gIQA3baZ7L_story.html?hpid=z1',
    'test_url' => 'http://www.washingtonpost.com/national/health-science/radical-theory-of-first-americans-places-stone-age-europeans-in-delmarva-20000-years-ago/2012/02/28/gIQA4mriiR_story.html',
    'test_url' => 'http://www.washingtonpost.com/lifestyle/magazine/the-sorry-fate-of-a-tech-pioneer-halsey-minor-and-historic-virginia-estate-carters-grove/2012/05/30/gJQAwdJG4U_story.html',
    'body' => array(
         '//div[@class=\"article_body\"]',
    ),
    'strip' => array(
         '//div[@class=\"relative primary-slot padding-top img-border gallery-container photo-wrapper\"]',
         '//div[@id=\"wp-column six end\"]',
         '//div[contains(@class,\'hidden\')]',
         '//div[@id=\'article-side-rail\']',
         '//div[@class=\"module component todays-paper-module curved\"]',
         '//div[@class=\"module component live-qa curved img-border\"]',
         '//div[@class=\"module component newsletter-signup curved\"]',
         '//div[@class=\"module featured-stories component curved img-border\"]',
    ),
    'strip_id_or_class' => array(
         'carousel',
         'toolbar',
         'module',
    ),
);
