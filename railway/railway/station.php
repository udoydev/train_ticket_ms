<?php include ('dash.php');?>
<?php
// Include the database connection file
include('coni.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize if necessary
    $sid = $_POST['sid'];
    $sn = $_POST['s_name'];
    $lo = $_POST['location'];
   
   

    // SQL query to insert values into the database table
    $sql = "INSERT INTO station (sid, s_name, location) 
            VALUES ('$sid ', '$sn', '$lo' )";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
       echo"";
    } else {
        return false;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href=".////passenger.css">
    <title>Customer</title>
</head>
<body>

  <section>
  
  <div class="from">
        <form action="" method="post">

            <label for="sid" id="sid">Station Id:</label>
            <input type="text" name="sid" placeholder="write the sid"><br><br>

            <label for="s_name" id="s_name">Station Name :</label>
            <input type="text" name="s_name" placeholder="write the name of station"><br><br><br>
            <label for="location" id="location"> Location :</label>
            <input type="text" name="location" placeholder="write your Station Location "><br><br><br>

          

       
<center><button type="submit">Button</button></center>
       

            
        </form>
    </div>
  </section>
  <?php include ('foot.php');?>
</body>
</html>


    