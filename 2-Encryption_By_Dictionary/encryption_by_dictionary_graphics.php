<?php
/* Giacchini Valerio
* 5A(IN) - Computer Class
* */

header("Location: ../work_in_progress.html");

session_start();
require_once "../remember.php";
remember_encrypt_decode();
require 'encryption_by_dictionary_logic.php';
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Encryption By Dictionary</title>
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
    <h1>Encrypt By Dictionary</h1>
    <p>Creates a key from the text to be encrypted</p>
    <p>Creates a dictionary that associates each letter of the alphabet with another.<br>
    Begins with all the letters of the text to be encrypted and continues with the rest of the alphabet.</p><br>

    <?php
    if(isset($_POST['encrypt'])) {
        echo "<h2>Encrypted text: ";
        echo encrypt_number($_POST['text'], $_POST['key']);
        echo "</h2>";
    } else if (isset($_POST['decode'])) {
        echo "<h2>Decoded text: ";
        echo decoding_number($_POST['text'], $_POST['key']);
        echo "</h2>";
    }
    ?>

    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Exercise</button>
    <button class="exit" onclick="location.href = '../home.php';"
            style="width:auto;">EXIT</button>
</div>

<div id="id01" class="modal">

    <form class="modal-content animate" action="encryption_by_number_graphics.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container">
            <label><b>Text</b></label>
            <label>
                <input type="text" placeholder="Enter the text you want to encrypt or Decode" name="text" required>
            </label>

            <label><b>Key</b></label>
            <label>
                <input type="number" placeholder="Enter the key number for encryption and decryption" name="key" required>
            </label>

            <button type="submit" name="encrypt">Encrypt</button>
            <button type="submit" name="decode">Decode</button>
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