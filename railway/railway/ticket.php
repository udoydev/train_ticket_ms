<?php include ('dash.php');?>
<?php
// Include the database connection file
include('coni.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize if necessary
    $sid = $_POST['tkid'];
    $sn = $_POST['PID'];
    $lo = $_POST['tid'];
    $sns = $_POST['seat_n'];
    $los = $_POST['booking_d'];
    $dep = $_POST['dept'];
    $de = $_POST['sta'];
   
   

    // SQL query to insert values into the database table
    $sql = "INSERT INTO ticket (tkid, PID, tid,seat_n,booking_d,Dept,sta) 
            VALUES ('$sid ', '$sn', '$lo' ,'$sns','$los','$dep','$de')";

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

            <label for="tkid" id="tkid">Ticket Id:</label>
            <input type="text" name="tkid" placeholder="write the ticket id"><br><br>

            <label for="PID" id="PID">Passenger Id :</label>
            <input type="text" name="PID" placeholder="write the passenger id"><br><br><br>

            <label for="tid" id="tid">Train Id:</label>
            <input type="text" name="tid" placeholder="write the train id"><br><br>

            <label for="seat_n" id="seat_n">Seat No:</label>
            <input type="text" name="seat_n" placeholder="write the Seat_number"><br><br>
          
            <label for="booking_d" id="booking_d">Train Id:</label>
            <input type="date" name="booking_d" placeholder="write the booking_date"><br><br>

            <label for="dept" id="dept">Departure Location:</label>
            <input type="text" name="dept" placeholder="write the departure Location"><br><br>

            <label for="sta" id="sta">Station Name:</label>
            <input type="text" name="sta" placeholder="write the Station Name"><br><br>

       
<center><button type="submit">Button</button></center>
       

            
        </form>
    </div>
  </section>
  <?php include ('foot.php');?>
</body>
</html>


    