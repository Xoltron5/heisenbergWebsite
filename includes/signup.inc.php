<?php

// Check if the submit button was clicked
if (isset($_POST["submit"])) {
    
    // Retrieve form data from POST variables
    $name = $_POST["name"];         // User's name
    $email = $_POST["email"];       // User's email address
    $username = $_POST["uid"];      // Username chosen by the user
    $pwd = $_POST["pwd"];           // Password entered by the user
    $pwdRepeat = $_POST["pwdrepeat"];  // Password confirmation entered by the user

    // Include database connection and functions files
    require_once 'dbh.inc.php';       // Database connection
    require_once 'functions.inc.php'; // File that contains additional functions

    // Check for empty inputs in the signup form
    // This function is expected to return false if inputs are valid
    if (emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) !== false) {
        // Redirect to signup page with an error query parameter if any input is empty
        header("location: ../signup.php?error=emptyinput");
        exit(); // Terminate script execution and prevent further script execution
    }

    if (invalidUid($username)!== false) {
        // Redirect to signup page with an error query parameter if any input is empty
        header("location: ../signup.php?error=invaliduid");
        exit(); // Terminate script execution and prevent further script execution
    }

    if (invalidEmail($email) !== false) {
        // Redirect to signup page with an error query parameter if any input is empty
        header("location: ../signup.php?error=invalidemail");
        exit(); // Terminate script execution and prevent further script execution
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        // Redirect to signup page with an error query parameter if any input is empty
        header("location: ../signup.php?error=passdoesnotmatch");
        exit(); // Terminate script execution and prevent further script execution
    }

    if (uidExists($conn, $username, $email)!== false) {
        // Redirect to signup page with an error query parameter if any input is empty
        header("location: ../signup.php?error=usernametaken");
        exit(); // Terminate script execution and prevent further script execution
    }

    // Function to create a new user in the database
    createUser($conn, $name, $email, $username, $pwd);
} 
else {
    // If the form wasn't submitted, redirect to the signup page
    header("location: ../signup.php");
    exit(); // Terminate script execution
}
?>
