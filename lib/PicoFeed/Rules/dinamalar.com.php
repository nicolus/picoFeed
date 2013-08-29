<?php
return array(
    'title' => '//div[@class=\'newsdetbd\']',
    'test_url' => 'http://www.dinamalar.com/News_Detail.asp?Id=295725',
    'body' => array(
         '//div[@id=\'innerleft\']',
    ),
    'strip' => array(
         '//div[@class=\'mrrt\']',
         '//div[@id=\'selNotes\']',
    ),
    'strip_id_or_class' => array(
         '\'fdpd\'',
         '\'epapt\'',
         '\'newsrtwd\'',
         '\'padtp\'',
         '\'newdt\'',
         '\'newdlt\'',
         '\'clsNotes\'',
         '\'clear\'',
         '\'cmtwrap\'',
         '\'sess\'',
         '\'parents\'',
    ),
);
