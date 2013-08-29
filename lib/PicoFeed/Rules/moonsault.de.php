<?php
return array(
    'test_url' => 'http://www.moonsault.de/newzboard/index.php?news=22321&act=previous',
    'strip' => array(
         '//div/a',
         '//div/b',
         '//div/strong',
         '//td[@width=\'30%\']',
         '//br[1]',
         '//br[2]',
         '//br[3]',
         '//br[4]',
         '//a[@href=\'http://www.moonsault.de/newzboard/index.php?act=home\']',
    ),
    'strip_id_or_class' => array(
         'cse-branding-right',
    ),
);
