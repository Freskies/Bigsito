<?php
/* Giacchini Valerio
 * 5A(IN) - Computer Class
 * */
session_start();

if (!(isset ($_SESSION['name']) || isset($_POST['submit'])))
    header("Location: index.php");

else if (isset($_POST['submit'])) {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['surname'] = $_POST['surname'];
    $_SESSION['remember'] = isset($_POST['remember']);
}

// set cookie
if(isset($_POST['background_img']))
    setcookie("background_img", $_POST['background_img'], time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Big Site of Valerio</title>
    <link href="style.css" rel="stylesheet">
    <style>
        body {
            <?php
            require_once "background_cp.php";
            setBackgroundHome();
            ?>
        }
    </style>
</head>
<body>
<div class="myscript">
    <h1>Welcome <?php echo $_SESSION['surname'] . " " . $_SESSION['name']; ?></h1>

    <button onclick="location.href = '1-Encryption_By_Matrix/encryption_ny_matrix_graphics.php';"
            style="width:auto;">Matrix Encryption</button>
    <button onclick="location.href = '2-Encryption_By_Dictionary/encryption_by_dictionary_graphics.php';"
            style="width:auto;">Dictionary Encryption</button>
    <button onclick="location.href = '3-Encryption_By_Number/encryption_by_number_graphics.php';"
            style="width:auto;">Number Encryption</button><br>
    <button onclick="location.href = '4-Dice_Game/dice_game_home.php';"
            style="width:auto;">Dice Game</button>
    <button onclick="location.href = '5-BlackJack_Game/blackjack_game_home.php';"
            style="width:auto;">BlackJack Game</button>
    <button onclick="location.href = 'work_in_progress.html';"
            style="width:auto;">Roulette Game</button><br>
    <button class="exit" onclick="location.href = 'index.php';"
            style="width:auto;">EXIT</button>
</div>

</body>
</html>