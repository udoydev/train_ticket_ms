<?php
// Include your database connection
include('coni.php');

// Check if PID is provided in the URL
if(isset($_GET['pid'])) {
    $pid = $_GET['pid'];
    
    // Prepare a SQL statement to delete the record
    $sql = "DELETE FROM passenger WHERE PID = $pid";
    
    // Execute the delete query
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the previous page after successful deletion
        header("Location: view.php"); // Change 'index.php' to the name of your main page
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
