<?php
return array(
    'title' => '//h1[@id=\'storyTitle\']',
    'test_url' => 'http://www.staradvertiser.com/news/20111112_World_leaders_step_onto_isle_stage.html',
    'body' => array(
         '//div[@class=\'storytext\']',
    ),
    'strip_id_or_class' => array(
         'insideStoryAd',
         'printDesc',
         'sb_2010_story_tools',
         'FBConnectButton_Text',
         'breadcrumbs',
    ),
);
