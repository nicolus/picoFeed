<?php
return array(
    'grabber' => array(
        '%.*%' => array(
            'test_url' => 'https://www.ingenieur.de/technik/fachbereiche/robotik/in-80-tagen-unbemannt-ueber-den-atlantik/',
            'body' => array(
				'//*[contains(@class, "single__content")]',
                ),
            'strip' => array(
				'//*[contains(@class, "ad--inline")]',
            ),
        ),
    ),
);
