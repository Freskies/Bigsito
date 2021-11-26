<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

session_start();
require_once "../remember.php";
remember_game_home();
require 'blackjack_game_logic.php';
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blackjack Game</title>
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
    <h1>Blackjack Game</h1>
    <br>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Start</button>
    <button class="exit" onclick="location.href = '../home.php';"
            style="width:auto;">EXIT</button>
</div>

<div id="id01" class="modal">

    <form class="modal-content animate" action="blackjack_game_graphics.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container">
            <label><b>Name Player</b></label>
            <label>
                <input type="text" placeholder="Enter the name of the player 1" name="p1" required>
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
