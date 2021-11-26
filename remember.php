<?php
/* Giacchini Valerio
 * 5A(IN) - Computer Class
 * */

function remember_encrypt_decode ():void
{
    if (!(isset($_POST['encrypt']) || isset($_POST['decode']))) {
        if (!isset($_SESSION['remember'])) header("Location: ../index.php");
        if (!$_SESSION['remember']) session_destroy();
    }
}

function remember_game_home ():void
{
    if (!isset($_SESSION['remember'])) header("Location: ../index.php");
    if (!$_SESSION['remember']) session_destroy();
}

function remember_game_running ():void
{
    if (!isset($_POST['play'])) {
        if (!isset($_SESSION['p1'])) header("Location: ../index.php");
    }
}