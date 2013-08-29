<?php
return array(
    'title' => '//h1[@id=\'itemTitle\']',
    'test_url' => 'http://allrecipes.com/Recipe/Taco-Pie/Detail.aspx?src=rotd',
    'body' => array(
         '//img[@id=\"ctl00_CenterColumnPlaceHolder_recipe_photoStuff_imgPhoto\"] | //div[@id=\'ctl00_CenterColumnPlaceHolder_recipe_divSubmitter\'] | //div[contains(@class, \'recipe-details-content\')]',
    ),
    'strip' => array(
         '//div[@class=\'top-left\' or @class=\'top-right\' or @class=\'bot-left\' or @class=\'bot-right\']',
         '//div[contains(@class, \'rightcoltoolsdiv\')]',
         '//div[contains(@class, \'servings-form\')]',
         '//p[@class=\'nutritional-information\']',
         '//a[contains(@class, \'nutritional-information\') or contains(@class, \'nutritionanchor\')]',
         '//div[@id=\'nutri-info\']/div[contains(@class, \'title\')]',
         '//img[@id=\'ctl00_CenterColumnPlaceHolder_recipe_imgSubmitter\']',
    ),
    'strip_id_or_class' => array(
         'eshaAttribute',
         'eshaParagraph',
    ),
);
