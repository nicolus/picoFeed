<?php

namespace PicoFeed;

/**
 * @author   "Sebastián Grignoli" <grignoli@framework2.com.ar>
 * @package  Encoding
 * @version  1.2
 * @link     https://github.com/neitanod/forceutf8
 * @example  https://github.com/neitanod/forceutf8
 * @license  Revised BSD
 */
class Encoding
{
    protected static $win1252ToUtf8 = array(
        128 => "\xe2\x82\xac",
        130 => "\xe2\x80\x9a",
        131 => "\xc6\x92",
        132 => "\xe2\x80\x9e",
        133 => "\xe2\x80\xa6",
        134 => "\xe2\x80\xa0",
        135 => "\xe2\x80\xa1",
        136 => "\xcb\x86",
        137 => "\xe2\x80\xb0",
        138 => "\xc5\xa0",
        139 => "\xe2\x80\xb9",
        140 => "\xc5\x92",
        142 => "\xc5\xbd",
        145 => "\xe2\x80\x98",
        146 => "\xe2\x80\x99",
        147 => "\xe2\x80\x9c",
        148 => "\xe2\x80\x9d",
        149 => "\xe2\x80\xa2",
        150 => "\xe2\x80\x93",
        151 => "\xe2\x80\x94",
        152 => "\xcb\x9c",
        153 => "\xe2\x84\xa2",
        154 => "\xc5\xa1",
        155 => "\xe2\x80\xba",
        156 => "\xc5\x93",
        158 => "\xc5\xbe",
        159 => "\xc5\xb8"
    );

    protected static $utf8ToWin1252 = array(
        "\xe2\x82\xac" => "\x80",
        "\xe2\x80\x9a" => "\x82",
        "\xc6\x92"     => "\x83",
        "\xe2\x80\x9e" => "\x84",
        "\xe2\x80\xa6" => "\x85",
        "\xe2\x80\xa0" => "\x86",
        "\xe2\x80\xa1" => "\x87",
        "\xcb\x86"     => "\x88",
        "\xe2\x80\xb0" => "\x89",
        "\xc5\xa0"     => "\x8a",
        "\xe2\x80\xb9" => "\x8b",
        "\xc5\x92"     => "\x8c",
        "\xc5\xbd"     => "\x8e",
        "\xe2\x80\x98" => "\x91",
        "\xe2\x80\x99" => "\x92",
        "\xe2\x80\x9c" => "\x93",
        "\xe2\x80\x9d" => "\x94",
        "\xe2\x80\xa2" => "\x95",
        "\xe2\x80\x93" => "\x96",
        "\xe2\x80\x94" => "\x97",
        "\xcb\x9c"     => "\x98",
        "\xe2\x84\xa2" => "\x99",
        "\xc5\xa1"     => "\x9a",
        "\xe2\x80\xba" => "\x9b",
        "\xc5\x93"     => "\x9c",
        "\xc5\xbe"     => "\x9e",
        "\xc5\xb8"     => "\x9f"
    );

    /**
    * Function Encoding::toUTF8
    *
    * This function leaves UTF8 characters alone, while converting almost all non-UTF8 to UTF8.
    *
    * It assumes that the encoding of the original string is either Windows-1252 or ISO 8859-1.
    *
    * It may fail to convert characters to UTF-8 if they fall into one of these scenarios:
    *
    * 1) when any of these characters:   ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖ×ØÙÚÛÜÝÞß
    *    are followed by any of these:  ("group B")
    *                                    ¡¢£¤¥¦§¨©ª«¬­®¯°±²³´µ¶•¸¹º»¼½¾¿
    * For example:   %ABREPRESENT%C9%BB. «REPRESENTÉ»
    * The "«" (%AB) character will be converted, but the "É" followed by "»" (%C9%BB)
    * is also a valid unicode character, and will be left unchanged.
    *
    * 2) when any of these: àáâãäåæçèéêëìíîï  are followed by TWO chars from group B,
    * 3) when any of these: ðñòó  are followed by THREE chars from group B.
    *
    * @name toUTF8
    * @param string $text  Any string.
    * @return string  The same string, UTF8 encoded
    *
    */
    public static function toUTF8($text)
    {
        if (is_array($text)) {
            foreach ($text as $k => $v) {
                $text[$k] = self::toUTF8($v);
            }

            return $text;
        }
        elseif (is_string($text)) {

            $max = strlen($text);
            $buf = "";

            for ($i = 0; $i < $max; $i++) {

                $c1 = $text{$i};

                if ($c1>="\xc0") { //Should be converted to UTF8, if it's not UTF8 already

                    $c2 = $i+1 >= $max? "\x00" : $text{$i+1};
                    $c3 = $i+2 >= $max? "\x00" : $text{$i+2};
                    $c4 = $i+3 >= $max? "\x00" : $text{$i+3};

                    if ($c1 >= "\xc0" & $c1 <= "\xdf") { //looks like 2 bytes UTF8

                        if ($c2 >= "\x80" && $c2 <= "\xbf") { //yeah, almost sure it's UTF8 already
                            $buf .= $c1 . $c2;
                            $i++;
                        }
                        else { //not valid UTF8.  Convert it.
                            $cc1 = (chr(ord($c1) / 64) | "\xc0");
                            $cc2 = ($c1 & "\x3f") | "\x80";
                            $buf .= $cc1 . $cc2;
                        }
                    }
                    else if ($c1 >= "\xe0" & $c1 <= "\xef") { //looks like 3 bytes UTF8

                        if ($c2 >= "\x80" && $c2 <= "\xbf" && $c3 >= "\x80" && $c3 <= "\xbf") { //yeah, almost sure it's UTF8 already
                            $buf .= $c1 . $c2 . $c3;
                            $i = $i + 2;
                        }
                        else { //not valid UTF8.  Convert it.
                            $cc1 = (chr(ord($c1) / 64) | "\xc0");
                            $cc2 = ($c1 & "\x3f") | "\x80";
                            $buf .= $cc1 . $cc2;
                        }
                    }
                    else if ($c1 >= "\xf0" & $c1 <= "\xf7") { //looks like 4 bytes UTF8

                        if ($c2 >= "\x80" && $c2 <= "\xbf" && $c3 >= "\x80" && $c3 <= "\xbf" && $c4 >= "\x80" && $c4 <= "\xbf") { //yeah, almost sure it's UTF8 already
                            $buf .= $c1 . $c2 . $c3;
                            $i = $i + 2;
                        }
                        else { //not valid UTF8.  Convert it.
                            $cc1 = (chr(ord($c1) / 64) | "\xc0");
                            $cc2 = ($c1 & "\x3f") | "\x80";
                            $buf .= $cc1 . $cc2;
                        }
                    }
                    else { //doesn't look like UTF8, but should be converted
                        $cc1 = (chr(ord($c1) / 64) | "\xc0");
                        $cc2 = (($c1 & "\x3f") | "\x80");
                        $buf .= $cc1 . $cc2;
                    }
                }
                elseif (($c1 & "\xc0") == "\x80") { // needs conversion

                    if (isset(self::$win1252ToUtf8[ord($c1)])) { //found in Windows-1252 special cases
                        $buf .= self::$win1252ToUtf8[ord($c1)];
                    }
                    else {
                        $cc1 = (chr(ord($c1) / 64) | "\xc0");
                        $cc2 = (($c1 & "\x3f") | "\x80");
                        $buf .= $cc1 . $cc2;
                    }
                }
                else { // it doesn't need convesion
                    $buf .= $c1;
                }
            }

            return $buf;
        }
        else {
            return $text;
        }
    }

    public static function cp1251ToUtf8($input)
    {
        return iconv('CP1251', 'UTF-8//TRANSLIT', $input);
    }
}
