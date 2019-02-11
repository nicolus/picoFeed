<?php
return [
    'grabber' => [
        '%.*%' => [
            'test_url' => 'https://en.wikipedia.org/wiki/Grace_Hopper',
            'body' => [
                '//div[@id="bodyContent"]',
            ],
            'strip' => [
                "//div[@id='toc']",
                "//div[@id='catlinks']",
                "//div[@id='jump-to-nav']",
                "//div[@class='thumbcaption']//div[@class='magnify']",
                "//table[@class='navbox']",
                "//table[contains(@class, 'infobox')]",
                "//div[@class='dablink']",
                "//div[@id='contentSub']",
                "//div[@id='siteSub']",
                "//table[@id='persondata']",
                "//table[contains(@class, 'metadata')]",
                "//*[contains(@class, 'noprint')]",
                "//*[contains(@class, 'printfooter')]",
                "//*[contains(@class, 'editsection')]",
                "//*[contains(@class, 'error')]",
                "//span[@title='pronunciation:']",
            ],
        ]
    ]
];
