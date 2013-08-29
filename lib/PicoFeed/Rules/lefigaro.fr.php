<?php
return array(
    'title' => '//meta[@name=\'title\']/@content',
    'test_url' => 'http://www.lefigaro.fr/environnement/2011/11/10/01029-20111110ARTFIG00801-la-chine-confrontee-a-un-immense-defi-ecologique.php',
    'test_url' => 'http://www.lefigaro.fr/conjoncture/2012/11/20/20002-20121120ARTFIG00609-l-usager-devrait-payer-plus-pour-financer-les-transports.php',
    'body' => array(
         '//*[@id=\'article\']/div[@class=\'photo\'] | //*[@id=\'article\']/h2 | //*[@id=\'article\']/div[@class=\'texte\']',
    ),
);
