<?php
return array(
    'title' => '//div[@class=\"content article\"]/h1',
    'test_url' => 'http://www.worldpoultry.net/news/kyrgyzstan-restricts-poultry-imports-from-russia-and-kazakhstan-9332.html',
    'body' => array(
         '//*[@class=\'article-content\']',
    ),
    'strip' => array(
         '//*[@id=\'nomodal\']',
    ),
);
