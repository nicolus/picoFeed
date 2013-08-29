<?php
return array(
    'title' => '//div[@class=\"articleHeader\"]/h1',
    'test_url' => 'http://forsvaret.no/aktuelt/publisert/nyheter/Sider/F5-fly-til-Skedsmo.aspx',
    'strip' => array(
         '//div[contains(@class,\"aside\")]',
         '//div[@id=\"ctl00_PlaceHolderMain_ArticleLeadField_label\"]',
         '//div[@id=\"ctl00_PlaceHolderMain_PublishingPageContentField_label\"]',
    ),
);
