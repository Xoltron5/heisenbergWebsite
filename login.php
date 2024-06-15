<?php
    include 'header.php';
?>
<head>
<link rel="stylesheet" href="css/login.css">
</head>
<div class="login-form">
    <h2 id="header2">Log In</h2>
    <form action="includes/login.inc.php" method ="post" class="loginform">
        <input type="text" name="uid" placeholder="Username/Email...">
        <input type="password" name="pwd" placeholder="Password...">
        <button type="submit" name="submit" id="submit">Log In</button>
    </form>
    <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fields!</p>";
            }
            else if ($_GET["error"] == "wronglogin") {
                echo "<p>Incorrect login information!</p>";
            }
        }
        ?>
</div>