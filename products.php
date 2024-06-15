<?php
    include 'header.php';
    include 'includes/dbh.inc.php';
?>
<head>
    <link rel="stylesheet" href="css/products.css">
</head>

<?php
    // Fetch all image files from the Icons folder
    $iconDirectory = 'ProductIcons/';
    $iconFiles = array_diff(scandir($iconDirectory), array('..', '.'));
    $iconFiles = array_values($iconFiles); // Re-index the array

    // Query to select productName and productPrice from the products table
    $result = $conn->query("SELECT productName, productPrice FROM products;");
    $index = 0; // Initialize a counter for the images

    // Check if the query returned any rows
    if ($result->num_rows > 0) {
        // Loop through each row in the result set
        while($row = $result->fetch_assoc()) {
            // Check if there is an image available for the product
            $imagePath = isset($iconFiles[$index]) ? $iconDirectory . htmlspecialchars($iconFiles[$index]) : 'path_to_default_image';
?>

<div class="gallery">
    <a target="_blank" href="<?php echo $imagePath; ?>">
        <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($row["productName"]); ?>">
    </a>
    <div class="description">
        <p>
            Name: <?php echo htmlspecialchars($row["productName"]); ?><br>
            Price: €<?php echo htmlspecialchars($row["productPrice"]); ?><br><br>
        </p>
    </div>
</div>

<?php
            $index++; // Increment the index to point to the next image
        }
    } else {
        echo "No products found."; // Output if no rows are returned
    }

    // Free result set
    $result->free();
?>
