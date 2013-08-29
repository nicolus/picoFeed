<?php
return array(
    'test_url' => 'http://www.recipe.com/avocado-basil-pasta/',
    'body' => array(
         '//div[@class=\'recipedetailsleft\' or @id=\'recipePrepAndServe\' or @id=\'recipeingredients\']',
    ),
    'strip_id_or_class' => array(
         'location',
         'savings',
         'recipeDetailDescButton',
    ),
);
