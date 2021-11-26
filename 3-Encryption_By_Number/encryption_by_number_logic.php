<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

function encrypt_number ($text, $key): string
{
    $key = abs($key) % 26;
    $newText = '';

    foreach(str_split(strtolower($text)) as $letter) {
        $newLetter = ord($letter);

        if (check_char($letter)) {
            $newLetter += $key;
            if ($newLetter > ord('z'))
                $newLetter = ord('a') + ($newLetter - ord('z')) - 1;
        }

        $newText .= chr($newLetter);
    }

    return $newText;
}

function decoding_number ($text, $key): string
{
    $key = abs($key) % 26;
    $newText = '';

    foreach(str_split(strtolower($text)) as $letter) {
        $newLetter = ord($letter);

        if (check_char($letter)) {
            $newLetter -= $key;
            if ($newLetter < ord('a'))
                $newLetter = ord('z') - (ord('a') - $newLetter) + 1;
        }

        $newText .= chr($newLetter);
    }

    return $newText;
}

function check_char ($letter):bool
{
    return ($letter >= 'a' && $letter <= 'z');
}