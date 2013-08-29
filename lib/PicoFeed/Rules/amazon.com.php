<?php
return array(
    'title' => '//span[@id = \'btAsinTitle\']',
    'test_url' => 'http://www.amazon.com/Common-Sense-Forestry-Living-Mother/dp/1931498210/',
    'body' => array(
         '(//*[@id=\'prodImageCell\']//a)[1] | //div[@id = \'ps-content\'] | //span[@id=\'actualPriceValue\'] | //h2[.=\'Product Details\']/following-sibling::div | //div[@class=\'h2\' and .=\'Product Description\']/following-sibling::div',
    ),
    'strip_id_or_class' => array(
         'nocontent',
         'masDynamicConten',
         'dynamic-content',
         'collapsePS',
         'expandPS',
         'psPlaceHolde',
    ),
    'strip' => array(
         '//li[contains(., \'update product info\') or contains(., \'give feedback on images\')]',
    ),
);
