<?php
/* Giacchini Valerio
 * 5A(IN) - Computer Class
 * */

function setBackgroundIndex(): void
{
    echo "background-image: url(\"background_img";
    if(isset($_COOKIE['background_img'])) echo $_COOKIE['background_img'];
    else echo "1";
    echo ".jpg\");";
}

function setBackgroundHome(): void
{
    echo "background-image: url(\"background_img";
    if (isset($_POST['background_img'])) echo $_POST['background_img'];
    else if (isset($_COOKIE['background_img'])) echo $_COOKIE['background_img'];
    else echo "1";
    echo ".jpg\");";
}

function setBackground(): void
{
    echo "background-image: url(\"../background_img";
    if(isset($_COOKIE['background_img'])) echo $_COOKIE['background_img'];
    else echo "1";
    echo ".jpg\");";
}

