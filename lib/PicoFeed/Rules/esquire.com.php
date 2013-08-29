<?php
return array(
    'title' => '//h1',
    'test_url' => 'http://www.esquire.com/features/impossible/price-is-right-perfect-bid-0810',
    'body' => array(
         '//div[@id=\'printBody\']',
    ),
    'single_page_link' => array(
         'concat(\'http://www.esquire.com/print-this/\', substring-after(//link[@rel=\'canonical\']/@href, \'esquire.com/\'))',
    ),
);
