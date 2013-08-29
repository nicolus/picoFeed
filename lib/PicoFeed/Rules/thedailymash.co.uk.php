<?php
return array(
    'test_url' => 'http://www.thedailymash.co.uk/index.php?option=com_content&task=view&id=4994&Itemid=81&utm_source=feedburner&utm_medium=feed&utm_campaign=Feed%3A+thedailymash+%28The+Daily+Mash.+It%27s+news+to+us.%29',
    'strip' => array(
         '//div[@id=\'content\']/div[1][@class=\'full_intro\']/h2',
         '//*[(@class= \"aside\")]',
         '//div[@class=\"date\"]',
    ),
);
