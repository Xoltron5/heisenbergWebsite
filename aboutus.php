<?php
    // Include the database connection
    include 'header.php';
    require_once 'includes/dbh.inc.php';
?>
<head>
    <link rel="stylesheet" href="css/aboutus.css">
</head>
<div id="qnaportal">
    <div id="askquestions">
        <h2>Ask a Pharmacist: Your Interactive Q&A Portal</h2>
        <p>Welcome to your go-to source for trusted health information! 
        At Heisenberg Pharmacy, we understand that health is personal and sometimes, 
        you need answers tailored to your unique health journey. That's why we've created
        "Ask a Pharmacist"—an interactive platform where your queries meet expert advice.
        Curious about medication interactions? Pondering the best ways to manage your wellness
        routine? Or maybe you're seeking clarity on health information you've come across? 
        Whatever your question, our knowledgeable pharmacy team is here to provide you with 
        accurate, understandable, and helpful answers.</p>
    </div>

    <div id="qnasubmission">
        <form action="includes/qaportal.inc.php" method="POST" id="commentform">
            <textarea name="comment" id="comment" cols="100" rows="10"></textarea>
            <button type="submit" name="submit" id="submit">Submit</button>
        </form>
    </div>


    <div>
        <?php
        if (isset($_GET['comment']) && $_GET['comment'] == 'success') {
            echo '<p class="success-message">Comment added successfully!</p>';
        }
        if (isset($_GET['error'])) {
            if ($_GET['error'] == 'emptycomment') {
                echo '<p class="error-message">Please submit a comment.</p>';
            } elseif ($_GET['error'] == 'commentfail') {
                echo '<p class="error-message">Error adding comment.</p>';
            }
        }
        ?>
    </div>

</div>
