<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

use JetBrains\PhpStorm\Pure;

session_start();
require_once "../remember.php";
remember_game_running();
require 'dice_game_logic.php';

#[Pure] function get_print_roll ($roll, $player): string
{
    $print_roll = "<span";
    if ($roll == 66) $print_roll .= " class='winner'";
    else if ($_SESSION['win'] && $_SESSION['turn'] != $player && areLoserDice($roll))
        $print_roll .= " class='loser'";
    $print_roll .= ">" . getCharDice($roll) . "</span>";

    return $print_roll;
}

// first time
if (isset($_POST['p1'])) {
    $_SESSION['p1'] = $_POST['p1'];
    $_SESSION['p2'] = $_POST['p2'];
    $_SESSION['turn'] = true; // true = p1, false = p2
    $_SESSION['roll_p1'] = array();
    $_SESSION['roll_p2'] = array();
    $_SESSION['win'] = false;
    $_SESSION['remember_param'] = $_SESSION['p1']; // for remember function
}

if (isset($_POST['roll'])) {
    $dice1 = rollDice();
    $dice2 = rollDice();

    $_SESSION['dice_rolled'] = ($dice1 * 10) + $dice2;

    // add results to table
    $_SESSION[$_SESSION['turn'] ? 'roll_p1' : 'roll_p2'][] = $_SESSION['dice_rolled'];

    if (trueEnd($_SESSION['dice_rolled'])) $_SESSION['win'] = true;
    else if (secondEnd($_SESSION['dice_rolled'], $_SESSION[$_SESSION['turn'] ? 'roll_p1' : 'roll_p2'])) {
        $_SESSION['win'] = true;
        $_SESSION['turn'] = !$_SESSION['turn'];
    }
    // the game continue
    else {
        $_SESSION['turn'] = !$_SESSION['turn'];
    }
}
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dice Game</title>
    <link href="../style.css" rel="stylesheet">
    <style>
        body {
        <?php
        require_once "../background_cp.php";
        setBackground();
        ?>
        }
        td, th {
            padding: 0 15px;
        }
        td.dice {
            font-size: 40px;
        }
    </style>
</head>
<body>
<div class="myscript">
    <?php
    echo "<h1>";
    echo $_SESSION['win'] ? "The winner is " : "Turn of ";
    echo $_SESSION['turn'] ? $_SESSION['p1'] : $_SESSION['p2'];
    echo "</h1>";
    ?>

    <table style="margin: auto; table-layout: fixed">
        <tr>
            <th><?php echo $_SESSION['p1'] ?></th>
            <th><?php echo $_SESSION['p2'] ?></th>
        </tr>
        <?php
        for ($i = 0; $i < sizeof($_SESSION['roll_p1']); $i++) {
            echo "<tr><td class='dice'>";
            echo get_print_roll($_SESSION['roll_p1'][$i], true) . "</td><td class='dice'>" .
                (isset($_SESSION['roll_p2'][$i]) ? get_print_roll($_SESSION['roll_p2'][$i], false) : "");
            echo "</td></tr>";
        }
        ?>
    </table>

    <br>
    <form action="dice_game_graphics.php" method="post" style="background-color: #888888">
        <?php
        if ($_SESSION['win']) unset_game ();
        else echo "<button style='width:auto;' type='submit' name='roll''>Roll</button>";
        ?>
    </form>
    <button class="exit" onclick="location.href = '../home.php';"
            style="width:auto;">EXIT</button>
</div>
</body>
</html>
