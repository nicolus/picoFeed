<?php
return array(
    'title' => '//div[@class=\"album_title\"]//h1',
    'test_url' => 'http://www.livescience.com/34569-why-flowers-close-at-night-nyctinasty.html',
    'body' => array(
         '//div[@class=\"about_text\"]',
    ),
    'strip' => array(
         '//div[@class=\'large_popper\']',
         '//span[contains(@id, \'mag_glass\')]',
         '//span[contains(@class, \'img_overlay\')]',
         '//td//span',
         '//div[@class=\"center_adsense\"]',
         '//div[@class=\"article_info\"]//div[@class=\'asset_section\']',
         '//div[@class=\"article_additional\"]',
         '//div[contains(@style, \'overflow:hidden\')]',
         '//div[@class=\"aa_text\"]',
         '//div[@id=\'nointelliTXT\']',
    ),
);
