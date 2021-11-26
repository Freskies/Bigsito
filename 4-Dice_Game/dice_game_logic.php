<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

function rollDice (): int
{
    return rand(1, 6);
}

function getRolls ($roll): string
{
    $dice1 = (int) ($roll / 10);
    $dice2 = $roll % 10;
    return $dice1 . " " . $dice2;
}

function trueEnd ($roll): bool
{
    return $roll == 66;
}

function secondEnd ($total_dice, $rolls): bool
{
    foreach ($rolls as $roll) if ($roll == $total_dice) return true;
    return false;
}