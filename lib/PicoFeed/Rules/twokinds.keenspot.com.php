<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'http://twokinds.keenspot.com/archive.php?p=0',
            'body' => ['//*[@class="comic"]/div/a/img | //*[@class="comic"]/div/img | //*[@id="cg_img"]/img | //*[@id="cg_img"]/a/img'],
            'strip' => [],
        ],
    ],
];
