<?php
return array(
    'title' => '//div[@id=\'H_docTitle\']',
    'test_url' => 'http://www.accesstoinsight.org/lib/authors/nyanaponika/wheel026.html',
    'body' => array(
         '//div[@id=\'H_meta\' or @id=\'H_content\' or @id=\'F_footer\']',
    ),
    'strip_id_or_class' => array(
         'F_toenail',
    ),
);
