<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

session_start();
require_once "../remember.php";
remember_game_home();
require 'dice_game_logic.php';
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
    </style>
</head>
<body>
<div class="myscript">
    <h1>Dice Game</h1>
    <table style="width: 80%; margin: auto">
        <tr>
            <th>Number of players</th>
            <th>Game type</th>
            <th>Game turn</th>
        </tr>
        <tr>
            <td>2</td>
            <td>turn-based</td>
            <td>2 dice of 6 are rolled</td>
        </tr>
    </table>
    <br>
    <table style="width: 80%; margin: auto">
        <tr>
            <th>End 1</th>
            <th>End 2</th>
        </tr>
        <tr>
            <td>one of the 2 players scores 12 and wins</td>
            <td>one of the 2 players rolls a combination of dice already rolled and lose</td>
        </tr>
    </table>
    <br>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Start</button>
    <button class="exit" onclick="location.href = '../home.php';"
            style="width:auto;">EXIT</button>
</div>

<div id="id01" class="modal">

    <form class="modal-content animate" action="dice_game_running.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container">
            <label><b>Name Player 1</b></label>
            <label>
                <input type="text" placeholder="Enter the name of the player 1" name="p1" required>
            </label>

            <label><b>Name Player 2</b></label>
            <label>
                <input type="text" placeholder="Enter the name of the player 2" name="p2" required>
            </label>

            <button type="submit" name="play">Play</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
    </form>
</div>

<script>
    // Get the modal
    const modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target === modal) modal.style.display = "none";
    }
</script>
</body>
</html>
