<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

const CARDS = "&#1271";

// seed: spades (0), hearts (1), clubs (2), diamonds (3)
const SEED = array(36, 52, 84, 68);
const DIMENSION = "140px";

const SPADES = 0;
const HEARTS = 1;
const CLUBS = 2;
const DIAMONDS = 3;

function getCard ($number, $seed): string
{
    // char of card
    $end = SEED[$seed] + $number;
    if ($number > 11) $end++;

    // color
    $class = $seed % 2 == 0 ? "style='color: black" : "style='color: red";
    return "<span " . $class . "; font-size: ". DIMENSION . "'>" . CARDS . $end . ";</span>";
}

