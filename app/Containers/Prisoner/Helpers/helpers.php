<?php

if (!function_exists('bin2bstr')) {
    function bin2bstr($input)
    {
        $text = array();
        $bin = explode(" ", $input);
        for ($i = 0; count($bin) > $i; $i++) {
            $text[] = chr(bindec($bin[$i]));
        }

        return implode($text);
    }
}

if (!function_exists('bstr2bin')) {
    function bstr2bin($input)
    {
        $bin = array();
        for ($i = 0; strlen($input) > $i; $i++) {
            $bin[] = decbin(ord($input[$i]));
        }

        return implode(' ', $bin);
    }
}
