<?php
// Include your database connection


include('coni.php');

// Check if tid is provided in the URL
if(isset($_GET['sid'])) {
    $tid = $_GET['sid']; // Get the tid from the URL

    // Prepare a SQL statement to delete the record
    $sql = "DELETE FROM station WHERE sid = $tid";

    // Execute the delete query
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the previous page after successful deletion
        header("Location: viewsta.php"); // Change 'viewt.php' to the name of your train view page
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
