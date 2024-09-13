<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "railway_system";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $db_name);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
else {
  echo "Connection successfully";
  $sql = "INSERT INTO signup(email, pass) VALUES ('$_POST[email]','$_POST[password]')";
}


    
    // Attempt insert query execution
   
    if (mysqli_query($conn, $sql)) {
      header("Location: sign.php"); 
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


// Close connection
mysqli_close($conn);
?>