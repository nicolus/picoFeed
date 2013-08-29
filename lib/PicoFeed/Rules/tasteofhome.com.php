<?php
return array(
    'title' => '//span[@id=\'ctl00_ctl00_MainContent_MainContent_RecipeImage1_lblRecipeTitle\']',
    'test_url' => 'http://www.tasteofhome.com/recipes/Grinch-Punch',
    'body' => array(
         '//div[@id=\'RDNEW\']//*[@class=\'Recipe-imgCon\' or @class=\'Recipe-Intro\' or @class=\'recipeDetails\']',
    ),
    'strip_id_or_class' => array(
         'rec-ExRightPanel',
         'divCarousel',
         'preptimeOuter',
         'cooktimeOuter',
         'durationOuter',
         'divImageFooter',
         'microFormatFnIngred',
    ),
    'strip' => array(
         '//span[@class=\'Recipe-Intro\']//*[@class=\'link\' or @class=\'rating\']',
    ),
);
