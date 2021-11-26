<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

session_start();
require_once "../remember.php";
remember_game_running();
require 'dice_game_logic.php';

function unset_game (): void
{
    unset($_SESSION['p1']);
    unset($_SESSION['p2']);
    unset($_SESSION['turn']);
    unset($_SESSION['roll_p1']);
    unset($_SESSION['roll_p2']);
    unset($_SESSION['win']);
}

if (isset($_POST['p1'])) {
    $_SESSION['p1'] = $_POST['p1'];
    $_SESSION['p2'] = $_POST['p2'];
    $_SESSION['turn'] = true; // true = p1, false = p2
    $_SESSION['roll_p1'] = array();
    $_SESSION['roll_p2'] = array();
    $_SESSION['win'] = false;
}

if (isset($_POST['roll'])) {
    $dice1 = rollDice();
    $dice2 = rollDice();
    $total_dice = ($dice1 * 10) + $dice2;

    if (trueEnd($total_dice)) $_SESSION['win'] = true;
    $lose = false;
    if (secondEnd($total_dice, $_SESSION[$_SESSION['turn'] ? 'roll_p1' : 'roll_p2'])) {
        $_SESSION['win'] = true;
        $lose = true;
    }

    // add results to table
    $_SESSION[$_SESSION['turn'] ? 'roll_p1' : 'roll_p2'][] = $total_dice;

    $_SESSION['turn'] = $_SESSION['win'] ? $_SESSION['turn'] : !$_SESSION['turn'];
    if ($lose) $_SESSION['turn'] = !$_SESSION['turn'];
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
            echo "<tr><td>";
            echo getRolls($_SESSION['roll_p1'][$i]) . "</td><td>" .
                (isset($_SESSION['roll_p2'][$i]) ? getRolls($_SESSION['roll_p2'][$i]) : "");
            echo "</td></tr>";
        }
        ?>
    </table>

    <br>
    <form action="dice_game_running.php" method="post" style="background-color: #888888">
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
