<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

function encrypt_matrix ($text, $key): string
{
    return encrypt_get_results_by_matrix(encrypt_create_matrix($text, $key));
}

function decoding_matrix ($text, $key): string
{
    return decoding_get_results_by_matrix(decoding_create_matrix($text, $key));
}

function encrypt_create_matrix ($text, $key): array
{
    $matrix = array ();

    // find the number of columns
    $nCol = (int) (strlen ($text) / $key);
    $extraCol = strlen ($text) % $key;

    $i = 0;
    $row = array ();
    foreach (str_split ($text) as $letter) {
        $row [] = $letter;
        $i++;

        // it is used in case you need an extra column
        if ($i == $nCol) {
            if ($extraCol > 0) $extraCol--;
            else {
                $i = 0;
                $matrix [] = $row;
                $row = array ();
            }
        } else if ($i > $nCol) {
            $i = 0;
            $matrix [] = $row;
            $row = array ();
        }
    }

    return $matrix;
}

function encrypt_get_results_by_matrix ($matrix): string
{
    $string = "";

    for ($i = 0; $i < count ($matrix [0]); $i++)
        foreach ($matrix as $row) {
            if (isset ($row [$i]))
                $string = $string . $row [$i];
        }

    return $string;
}

function decoding_create_matrix ($text, $key): array
{
    $matrix = array ();

    // create rows
    for ($i = 0; $i < $key; $i++) $matrix [] = array ();

    $i = 0;
    foreach (str_split ($text) as $letter) {
        $matrix [$i][] = $letter;
        $i++;

        if ($i == $key) $i = 0;
    }

    return $matrix;
}

// read matrix by row
function decoding_get_results_by_matrix ($matrix): string
{
    $string = '';

    foreach ($matrix as $row)
        $string = implode('', $row);

    return $string;
}