<?php
return array(
    'title' => '//h2[@class=\"pageTitle\"]',
    'test_url' => 'http://weblogs.asp.net/scottgu/archive/2011/08/31/html-editor-smart-tasks-and-event-handler-generation-asp-net-vnext-series.aspx',
    'strip' => array(
         '//div[@class=\"postfoot\"]',
         '//h2[@class=\"pageTitle\"]',
         '//h3[@class=\"pageTitle\"]',
    ),
    'body' => array(
         '//div[@class=\"post\"]',
    ),
);
