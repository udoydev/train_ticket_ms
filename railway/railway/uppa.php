<?php include('dash.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Passenger Information</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    .form-container {
    
    
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    form {
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <header>
    </header>
  <div class="form-container">
  <?php include('coni.php'); ?>
    <form method="post">
      <?php
      // Check if PID is provided in the URL
      if(isset($_GET['pid'])) {
        $pid = $_GET['pid'];
        
        // Retrieve the passenger record based on PID
        $sql = "SELECT * FROM passenger WHERE PID = $pid";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          // Fetch the passenger record
          $row = $result->fetch_assoc();
          
          // Handle form submission for updating passenger information
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $contact = $_POST['contact'];
            
            // Prepare an SQL statement to update the record
            $update_sql = "UPDATE passenger SET FNAME='$fname', LNAME='$lname', AGE='$age', GENDER='$gender', CONTACT='$contact' WHERE PID='$pid'";
            
            // Execute the update query
            if ($conn->query($update_sql) === TRUE) {
              header("Location: view.php"); // Redirect to view page after successful update
              exit();
            } else {
              echo "Error updating record: " . $conn->error;
            }
          }
          
          // Display a form for updating passenger information pre-filled with existing data
          echo "<input type='hidden' name='pid' value='".$row['PID']."'>";
          echo "First Name: <input type='text' name='fname' value='".$row['FNAME']."'><br>";
          echo "Last Name: <input type='text' name='lname' value='".$row['LNAME']."'><br>";
          echo "Age: <input type='text' name='age' value='".$row['AGE']."'><br>";
          echo "Gender: <input type='text' name='gender' value='".$row['GENDER']."'><br>";
          echo "Contact: <input type='text' name='contact' value='".$row['CONTACT']."'><br>";
          echo "<input type='submit' value='Update'>";
        } else {
          echo "0 results"; // No passenger found with the provided PID
        }
      } else {
        echo "PID not provided"; // No PID provided in the URL
      
      }

// Close the database connection
$conn->close();
?>
</form>
    </div>
   
</body>
</html>
<?php include('foot.php'); ?>