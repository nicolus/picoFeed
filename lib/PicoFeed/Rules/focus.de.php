<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.focus.de/politik/ausland/ein-jahr-nach-bombenanschlag-u-bahn-attentaeter-von-minsk-hingerichtet_aid_724958.html',
    'body' => array(
         '//div[@id=\'article\']',
    ),
    'strip' => array(
         '//span[@class=\'markerText\']',
         '//div[@class=\'articleContent small\']/div[@class=\'textBlock\']//span[@class=\'created\']',
         '//div[@class=\'sidebar\']',
         '//div[@class=\'starbar\']',
         '//div[@class=\'actions clearfix\']',
         '//div[@id=\'commentForm\']',
         '//div[@id=\'commentSent\']',
         '//div[@id=\'comments\']',
         '//div[@class=\'similarityBlock\']',
    ),
);
