<?php

if (isset($_POST['submit']) && !empty($_POST['comment'])) {
    $comment = $_POST['comment'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    $stmt = $conn->prepare("INSERT INTO comments (comment) VALUES (?)");
    $stmt->bind_param("s", $comment);
    $stmt->execute();

    // Check affected rows before closing the statement
    if ($stmt->affected_rows > 0) {
        // Redirect to aboutus.php with a success message
        $stmt->close(); // Close the statement here, before redirection
        $conn->close(); // Close the database connection before redirection
        header("Location: ../aboutus.php?comment=success");
    } else {
        // Redirect with an error message
        $stmt->close(); // Close the statement here, before redirection
        $conn->close(); // Close the database connection before redirection
        header("Location: ../aboutus.php?error=commentfail");
    }
    exit();
} else {
    header("Location: ../aboutus.php?error=emptycomment");
    exit();
}
?>
