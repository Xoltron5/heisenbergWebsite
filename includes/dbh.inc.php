<?php

// Define server details and database credentials
$serverName = "localhost";        // Database server name, typically 'localhost' for local development
$dBUsername = "root";             // Database username, default is 'root' for local development environments
$dBPassword = "";                 // Database password, empty string for local setups with no password
$dBName = "heisenberg_database";  // The specific name of the database to connect to

// Attempt to connect to the MySQL database
$conn = mysqli_connect(
    $serverName, 
    $dBUsername, 
    $dBPassword, 
    $dBName 
);

// Check the connection
if (!$conn) {
    // Connection failed: terminate the script and display an error message
    die("Connection failed: " . mysqli_connect_error());
}
