<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

session_start();
require_once "../remember.php";
remember_game_running();
require 'blackjack_game_logic.php';

const DEALER = "Dealer";

function unset_game (): void
{
    unset($_SESSION['player']);
    unset($_SESSION['win']);
    unset($_SESSION['winner']);
    unset($_SESSION['remember_param']);
}

// first time
if (isset($_POST['p'])) {
    $_SESSION['player'] = $_POST['p'];
    $_SESSION['win'] = false;
    $_SESSION['winner'] = DEALER;
    $_SESSION['remember_param'] = $_SESSION['player']; // for remember function
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

    <br>
    <form action="blackjack_game_graphics.php" method="post" style="background-color: #888888">
        <button style='width:auto;' type='submit' name='card''>Card</button>
        <button style='width:auto;' type='submit' name='stand''>Stand</button>
    </form>
    <button class="exit" onclick="location.href = '../home.php';"
            style="width:auto;">EXIT</button>
</div>
</body>
</html>
