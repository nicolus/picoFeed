<?php
return array(
    'grabber' => array(
        '%/comic/.*%' => array(
            'test_url' => 'http://theawkwardyeti.com/comic/happy-friday-2/',
            'body' => array(
                '//div[@id="comic"]//img'
            ),
            'strip' => array()
        )
    )
);
