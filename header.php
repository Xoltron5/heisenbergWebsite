<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmancy Website</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="header">
        <div class="topheader">
            <div class="logo">
                Heisenberg
                <img src="Icons/Heisenberg Logo.gif" alt="Logo of Heisenberg" id="logo">
            </div>
            <div class="accountactions">
                <?php 
                    if (isset($_SESSION["useruid"])) {
                        echo "<a href='includes/logout.inc.php' class='profilebutton'>Logout</a>";
                    }
                    else {
                        echo "<a href='signup.php' class='profilebutton'>Sign up</a>";
                        echo "<a href='login.php' class='profilebutton'>Login in</a>";
                    }
                ?>
            </div>
        </div>
        <div class="headerbuttons">
            <a class="mainbuttons" href="index.php">Home</a>
            <a class="mainbuttons" href="products.php">Products</a>
            <a class="mainbuttons" href="aboutus.php">Contact Us</a>
        </div>
    </div>
</body>
</html>