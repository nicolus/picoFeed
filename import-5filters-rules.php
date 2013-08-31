<?php

$dir = new DirectoryIterator('/Users/fred/Downloads/ftr-site-config-master/');

foreach ($dir as $fileinfo) {

    if (! $fileinfo->isDot() && $fileinfo->getExtension() == 'txt') {

        $lines = file($fileinfo->getRealPath());
        $hostname = $fileinfo->getBasename('.txt');

        $output = '<?php';
        $output .= "\nreturn array(\n";

        $keys = array();

        foreach ($lines as $line) {

            $line = trim($line);

            if ($line == '') continue;
            if ($line{0} == '#') continue;

            list($key, $value) = explode(':', $line, 2);

            if (in_array($key, array('test_url', 'title'))) {
                $output .= "    '".addslashes($key)."' => '".addslashes(trim($value))."',\n";
            }
            else if (in_array($key, array('body', 'strip', 'strip_id_or_class', 'next_page_link', 'single_page_link'))) {
                if (! isset($keys[$key])) $keys[$key] = array();
                $keys[$key][] = "'".addslashes(trim($value))."',\n";
            }
            else {
                //var_dump($key);
            }
        }

        foreach ($keys as $key => $values) {

            $output .= "    '".addslashes($key)."' => array(\n";

            foreach ($values as $value) {
                $output .= "         ".$value;
            }

            $output .= "    ),\n";
        }

        $output .= ");\n";

        if (! file_exists('lib/PicoFeed/Rules/'.$hostname.'.php'))
            file_put_contents('lib/PicoFeed/Rules/'.$hostname.'.php', $output);
    }
}
