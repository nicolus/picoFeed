<?php
return [
    'grabber' => [
        '%^/tp.*%' => [
            'test_url' => 'https://www.heise.de/tp/features/Macrons-Vermoegenssteuer-Der-Staat-verzichtet-auf-3-2-Milliarden-3863931.html',
            'body' => [
                '//main/article'
            ],
            'strip' => [
                '//header',
                '//aside',
                '//nav[@class="pre-akwa-toc"]',
                '//*[@class="seite_zurueck"]',
                '//*[@class="pagination"]',
                '//a[@class="kommentare_lesen_link"]',
                '//div[contains(@class, "shariff")]',
                '//a[@class="beitragsfooter_permalink"]',
                '//a[@class="beitragsfooter_fehlermelden"]',
                '//a[@class="beitragsfooter_printversion"]'
            ],
            'next_page' => [
                '//a[@class="seite_weiter"]'
            ],
        ],
        '%^/(ix|make|newsticker|mac-and-i)/meldung.*%' => [
            'test_url' => 'https://www.heise.de/newsticker/meldung/DragonFly-BSD-5-0-mit-experimentellem-HAMMER2-veroeffentlicht-3864731.html',
            'body' => [
                '//div[contains(@class,"article-content")]',
            ],
            'strip' => [
//                '//*[contains(@class, "gallery")]',
                '//*[contains(@class, "video")]',
                '//*[contains(@class, "-ad")]',
                '//h5[contains(@id, "pagination-heading")]',
                '//ol[contains(@class, "a-pagination__items")]/li[(not(contains(@class, "a-pagination__item--next")))]',
                '//*[@class="pagination__arrow--left"]',
                '//*[@class="pagination__arrow--right"]',
                '//a[@title="zur Startseite von heise online"]',
                '//nav[@class="a-toc"]',
                '//a[contains(@class, "article-footer__comment-button")]',
                '//nav[contains(@class, "a-pagination--all-on-one-page")]',
            ],
            'next_page' => [
                '//li[contains(@class,"a-pagination__item--next")]/a'
            ],
        ],
        '%^/autos/artikel.*%' => [
            'test_url' => 'https://www.heise.de/autos/artikel/Bericht-Mazda-baut-Range-Extender-mit-Wankelmotor-3864760.html',
            'body' => [
                '//section[@id="artikel_text"]'
            ],
            'strip' => [
                '//p[@id="content_foren"]',
                '//div[contains(@class, "shariff")]',
                '//p[@class="permalink"]',
                '//p[@class="printversion"]'
            ],
        ],
        '%^/foto/meldung.*%' => [
            'test_url' => 'https://www.heise.de/foto/meldung/Wildlife-Fotograf-des-Jahres-Gewinnerbild-zeigt-getoetetes-Nashorn-3864311.html',
            'body' => [
                '//div[@class="article-content"]'
            ],
        ],
        '%^/ct.*%' => [
            'test_url' => 'https://www.heise.de/ct/artikel/Google-Pixel-2-und-Pixel-2-XL-im-Test-3863842.html',
            'body' => [
                '//main/div[1]/div[1]/section'
            ],
            'strip' => [
                '//header'
            ]
        ],
        '%^/developer.*%' => [
            'test_url' => 'https://www.heise.de/developer/meldung/Container-Docker-unterstuetzt-Kubernetes-3863625.html',
            'body' => [
                '//article/div[@class="meldung_wrapper"]',
				'//*[contains(@class, "article-content")]',
            ],
            'strip' => [
 //               '//*[contains(@class, "gallery")]',
                '//*[contains(@class, "video")]',
				'//nav[@class="pre-akwa-toc"]',
            ],
			'next_page' => [
                '//a[@class="seite_weiter"]'
            ],
        ],
        '%.*%' => [
            'test_url' => 'https://www.heise.de/mac-and-i/meldung/iOS-App-Nude-findet-mittels-ML-Nacktbilder-und-versteckt-sie-3864217.html',
            'body' => [
                '//div[contains(@class,"article-content")]',
                '//article/div[@class="meldung_wrapper"]',
				'//article/div[@class="article-content"]',
				'//article/div/div[@class="akwa-article__content"]',
            ],
            'strip' => [
//                '//*[contains(@class, "gallery")]',
                '//*[contains(@class, "video")]',
				'//nav[@class="pre-akwa-toc"]',
            ],
			'next_page' => [
                '//a[@class="seite_weiter"]'
            ],
        ],
    ],
];
