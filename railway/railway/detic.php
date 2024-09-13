<?php
// Include your database connection
include('coni.php');

// Check if tkid is provided in the URL
if(isset($_GET['tkid'])) {
    $tkid = $_GET['tkid'];
    
    // Prepare a SQL statement to delete the ticket record
    $sql = "DELETE FROM ticket WHERE tkid = $tkid";
    
    // Execute the delete query
    if ($conn->query($sql) === TRUE) {
        // Redirect back to the viewt.php page after successful deletion
        header("Location: viewtic.php");
        exit(); // Stop further execution
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "Ticket ID (tkid) not provided";
}

// Close the database connection
$conn->close();
?>
