<?php

session_start();  // Start or resume the current session
session_unset();  // Remove all session variables
session_destroy();  // Destroy the session, deleting any session data

// Redirect the user to the index page
header("location: ../index.php");
