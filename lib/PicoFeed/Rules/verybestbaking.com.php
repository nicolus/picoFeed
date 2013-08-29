<?php
return array(
    'title' => '//title',
    'test_url' => 'http://www.verybestbaking.com/recipes/143190/Penne-Pasta-with-Sun-dried-Tomato-Cream-Sauce/detail.aspx',
    'body' => array(
         '//div[contains(@class, \'printRecipe\')]',
    ),
    'strip' => array(
         '//div[@class=\'recipeHeader\']',
    ),
    'single_page_link' => array(
         '//ul[@class=\'printOptions\']//a[contains(@href, \'detail.aspx?p=1&showphoto=true\')]',
    ),
);
