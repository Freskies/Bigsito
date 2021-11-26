<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

session_start();
require_once "../remember.php";
remember_game_running();
require "blackjack_game_logic.php";

function unset_game (): void
{

}
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<p style="font-size: 90px"><?php echo getCard(0, 13) ?></p>
</body>
</html>
