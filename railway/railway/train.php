<?php include ('dash.php');?>
<?php
// Include the database connection file
include('coni.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize if necessary
    $tid = $_POST['tid'];
    $ds = $_POST['d_station'];
    $as = $_POST['a_station'];
    $time = $_POST['a_time'];
   

    // SQL query to insert values into the database table
    $sql = "INSERT INTO train (tid, d_station, a_station, a_time) 
            VALUES ('$tid ', '$ds', '$as', '$time' )";

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

            <label for="tid" id="tid">Train Id:</label>
            <input type="text" name="tid" placeholder="write the tid"><br><br>

            <label for="d_station" id="d_station">Departure station :</label>
            <input type="text" name="d_station" placeholder="write your Departure station"><br><br><br>
            <label for="a_station" id="a_station">Arrival station :</label>
            <input type="text" name="a_station" placeholder="write your Arrival station "><br><br><br>

            <label for="a_time" id="a_time">Arrival Time :</label>
            <input type="time"  name="a_time" placeholder="write the Arrival Time"><br><br>

       
<a href="./view.php"><center><button type="submit">Button</button></center></a>
       

            
        </form>
    </div>
  </section>
  <?php include ('foot.php');?>
</body>
</html>


    