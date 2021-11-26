<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

const PREFIX_DICE = "&#98";
const DICE = 55;

function rollDice (): int
{
    return rand(1, 6);
}

function trueEnd ($roll): bool
{
    return $roll == 66;
}

function secondEnd ($total_dice, $rolls): bool
{
    array_pop($rolls);
    foreach ($rolls as $roll) if ($roll == $total_dice) return true;
    return false;
}

function getCharDice ($roll): string
{
    $dice1 = PREFIX_DICE . (DICE + (int) ($roll / 10)) . ";";
    $dice2 = PREFIX_DICE . (DICE + ($roll % 10)) . ";";
    return $dice1 . $dice2;
}

function areLoserDice ($roll): bool
{
    return $_SESSION['dice_rolled'] == $roll;
}

function unset_game (): void
{
    unset($_SESSION['p1']);
    unset($_SESSION['p2']);
    unset($_SESSION['turn']);
    unset($_SESSION['roll_p1']);
    unset($_SESSION['roll_p2']);
    unset($_SESSION['win']);
    unset($_SESSION['remember_param']);
    unset($_SESSION['dice_rolled']);
}