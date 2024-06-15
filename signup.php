<?php
    include 'header.php';
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="css/signup.css">
</head>

<div class="signup-form">
    <h2 id="header2">Sign Up</h2>
    <form action="includes/signup.inc.php" method ="post" class="signupform">
        <input type="text" name="name" placeholder="Full Name...">
        <input type="text" name="email" placeholder="Email...">
        <input type="text" name="uid" placeholder="Username...">
        <input type="password" name="pwd" placeholder="Password...">
        <input type="password" name="pwdrepeat" placeholder="Repeat Password...">
        <button type="submit" name="submit" id="submit">Sign Up</button>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<p>Fill in all fields!</p>";
                }
                else if ($_GET["error"] == "invaliduid") {
                    echo "<p>Fill in a proper Username!</p>";
                }
                else if ($_GET["error"] == "invalidemail") {
                    echo "<p>Fill in a proper Email!</p>";
                }
                else if ($_GET["error"] == "passdoesnotmatch") {
                    echo "<p>Password does not match!</p>";
                }
                else if ($_GET["error"] == "usernametaken") {
                    echo "<p>Username already taken!</p>";
                }
                else if ($_GET["error"] == "stmtfailed") {
                    echo "<p>Something went wrong, try again!</p>";
                }
            }
        ?>
    </form>
</div>

