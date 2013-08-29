<?php
return array(
    'test_url' => 'http://www.eurogamer.net/articles/digitalfoundry-vs-unreal-engine-4',
    'body' => array(
         '//div[ @class=\'content\' ]  |  //div[ @class=\'blog-entry\' ]',
    ),
    'strip' => array(
         '//h2/abbr  |  //div[ @class=\'lowleader\' ]  |  //*[ @class=\'discussion\' ]  |  //img[ @class=\'play-button\' ]  |  //div[ @class=\'boxout\' ] | //h2/a | //h2 | //h2/div | //p[ @class=\'timestamp\' ] | //a[ @class=\'eurogamer-author\' ] | //p[ @class=\'aPager\' ] | //h1 | //div[ @id=\'lowleader\' ] | //a[ @class=\'next\' ]  |  //div[contains(concat(\' \', normalize-space(@class), \' \'), \' pullquote \')]',
    ),
);
