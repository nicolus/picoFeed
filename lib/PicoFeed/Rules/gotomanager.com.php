<?php
return array(
    'title' => '//span[@id=\"showTitle\"]',
    'test_url' => 'http://www.gotomanager.com/news/details.aspx?id=86759',
    'strip' => array(
         '//span[@class=\"black_bold\"]',
         '//div[@id=\"sectionName\"]',
         '//div[@id=\"storyHeader\"]',
         '//div[@id=\"smallLeadImage\"]',
         '//div[@id=\"truehitsSurvey\"]',
         '//table[@id=\"relatedInfoTable\"]',
    ),
    'body' => array(
         '//div[@id=\"newsBodyText\"]',
    ),
);
