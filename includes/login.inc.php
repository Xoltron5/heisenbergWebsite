<?php

// Check if the login form has been submitted
if (isset($_POST["submit"])) {
    $username = $_POST["uid"];  // Retrieve the username from the form
    $pwd = $_POST["pwd"];  // Retrieve the password from the form

    require_once 'dbh.inc.php';  // Include the database connection file
    require_once 'functions.inc.php';  // Include the file with additional functions

    // Check if either the username or password is empty using the function
    // Corrected: Previously, username was passed twice mistakenly
    if (emptyInputLogin($username, $pwd) !== false) {
        // If inputs are empty, redirect to the login page with an error parameter
        header("location: ../login.php?error=emptyinput");
        exit();  // Stop script execution
    }

    // Function to handle user login
    loginUser($conn, $username, $pwd);
}
else {
    // If the form was not submitted, redirect to the login page with an error parameter
    header("location: ../login.php?error=emptyinput");
    exit();  // Stop script execution
}
?>
