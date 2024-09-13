<?php include ('dash.php');?>
<?php
// Include the database connection file
include('coni.php');

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data and sanitize if necessary
    $pid = $_POST['pid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];

    // SQL query to insert values into the database table
    $sql = "INSERT INTO passenger (PID, FNAME, LNAME, AGE, GENDER, CONTACT) 
            VALUES ('$pid', '$fname', '$lname', '$age', '$gender', '$contact')";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        echo "";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href=".///////passenger.css">
    <title>Customer</title>
</head>
<body>

  <section>
  
  <div class="from">
        <form action="" method="post">

            <label for="pid" id="pid">Passenger Id:</label>
            <input type="text" name="pid" placeholder="write your id"><br><br>

            <label for="fname" id="fname">First Name :</label>
            <input type="text" name="fname" placeholder="write your first name"><br><br><br>
            <label for="lname" id="lname">Last Name :</label>
            <input type="text" name="lname" placeholder="write your last name"><br><br><br>

            <label for="age" id="age">AGE :</label>
            <input type="text" name="age" placeholder="write your age"><br><br>

            <label>Gender </label><br><br>
            <label for="gender" id="Male">Male :</label>
          <input type="radio" name="gender" id="male"value="Male">
          <label for="gender" id="gender">Female :</label>
          <input type="radio" name="gender" id="female"value="Female" ><br><br><br>

            <label for="contact" id="contact">Contact :</label>
            <input type="tel" id="contact" name="contact" placeholder="+880" /><br><br>

       <center><button type="submit">Button</button></center>

            
        </form>
    </div>
  </section>
  <?php include ('foot.php');?>
</body>
</html>


    