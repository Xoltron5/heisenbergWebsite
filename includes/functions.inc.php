<?php

// Function to check for any empty required signup fields
function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat) {
    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)) {
        return true; // Returns true if any field is empty
    } else {
        return false; // Returns false if all fields are filled
    }
}

// Function to validate if the username is alphanumeric
function invalidUid($username) {
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return true; // Returns true if username is not alphanumeric
    } else {
        return false; // Returns false if username is alphanumeric
    }
}

// Function to validate if the email is valid
function invalidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true; // Returns true if email is invalid
    } else {
        return false; // Returns false if email is valid
    }
}

// Function to check if passwords match
function pwdMatch($pwd, $pwdRepeat) {
    if ($pwd !== $pwdRepeat) {
        return true; // Returns true if passwords do not match
    } else {
        return false; // Returns false if passwords match
    }
}

// Function to check if username or email already exists in the database
function uidExists($conn, $username, $email) {
    $sql = "SELECT * FROM users WHERE usersUid = ? OR usersEmail = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row; // Returns user data if username/email exists
    } else {
        return false; // Returns false if username/email does not exist
    }
    mysqli_stmt_close($stmt);
}

// Function to create a new user in the database
function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (usersName, usersEmail, usersUid, usersPwd) VALUES(?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT); // Hashing the password
    mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_start();
    $_SESSION["useruid"] = $username; // Storing username in session
    header("location: ../index.php?error=none");
    exit();
}

// Function to check for any empty required login fields
function emptyInputLogin($username, $pwd) {
    if (empty($username) || empty($pwd)) {
        return true; // Returns true if any field is empty
    } else {
        return false; // Returns false if all fields are filled
    }
}

// Function to handle user login
function loginUser($conn, $username, $pwd) {
    $uidExists = uidExists($conn, $username, $username); // Check if user exists
    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed); // Verifying the password
    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"]; // Storing user ID in session
        $_SESSION["useruid"] = $uidExists["usersUid"]; // Storing username in session
        header("location: ../index.php");
        exit();
    }
}
?>
