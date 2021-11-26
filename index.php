<?php
/* Giacchini Valerio
 * 5A(IN) - Computer Class
 * */
session_start();
?>
<!DOCTYPE html>
<html lang="">
<head>
    <title>Big Site of Valerio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="style.css" rel="stylesheet">
    <style>
        body {
            <?php
            require_once "background_cp.php";
            setBackgroundIndex();
            ?>
        }
    </style>
</head>
<body>

<div class="myscript">
    <h1>Giacchini Valerio - Big Site</h1>
    <p>This site contains every exercise done by Giacchini Valerio in the 5A computer class.</p>
    <p>the various templates used were taken from <a href="https://www.w3schools.com/">w3schools</a>.</p><br>
    <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>
</div>

<div id="id01" class="modal">

    <form class="modal-content animate" action="home.php" method="post">
        <div class="imgcontainer">
            <span onclick="document.getElementById('id01').style.display='none'" class="close"
                  title="Close Modal">&times;</span>
        </div>

        <div class="container">
            <label for="uname"><b>Name</b></label>
            <label>
                <input type="text" placeholder="Enter your Name" name="name" required>
            </label>

            <label for="psw"><b>Surname</b></label>
            <label>
                <input type="text" placeholder="Enter your Surname" name="surname" required>
            </label>

            <label>
                <select name="background_img">
                    <option value="1">Default</option>
                    <option value="2">Regular</option>
                    <option value="3">Abstract</option>
                </select>
            </label>

            <button type="submit" name="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id01').style.display='none'"
                    class="cancelbtn">Cancel</button>
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