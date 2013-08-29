<?php
return array(
    'title' => 'substring(substring-after(//title, \':\'), 1, string-length(substring-after(//title, \':\')) - 10)',
    'test_url' => 'http://dilbert.com/blog/entry/death_by_hypnosis_or_not/',
    'body' => array(
         '//*[contains(@class, \'SB_Content\')]',
    ),
);
