<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

const CARDS = "&#1271";

// seed: spades, hearts, diamonds, clubs
const SEED = array(36, 52, 68, 84);

function getCard ($seed, $number): string
{
    $end = SEED[$seed] + $number;
    if ($number > 11) $end++;
    return CARDS . $end . ";";
}

