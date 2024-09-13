<?php include('dash.php');?> 
<?php
// Include your database connection
include('coni.php');

// Check if tkid is provided in the URL
if(isset($_GET['tkid'])) {
    $tkid = $_GET['tkid'];
    
    // Retrieve the ticket record based on tkid
    $sql = "SELECT * FROM ticket WHERE tkid = $tkid";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // Fetch the ticket record
        $row = $result->fetch_assoc();
        
        // Handle form submission for updating ticket information
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve updated information from the form
            $pid = $_POST['pid'];
            $tid = $_POST['tid'];
            $seat_n = $_POST['seat_n'];
            $booking_d = $_POST['booking_d'];
            $dept = $_POST['dept'];
            $sta = $_POST['sta'];
            
            // Construct and execute an SQL UPDATE query to modify the ticket record
            $update_sql = "UPDATE ticket SET PID='$pid', tid='$tid', seat_n='$seat_n', booking_d='$booking_d', Dept='$dept',sta='$sta' WHERE tkid='$tkid'";
            
            if ($conn->query($update_sql) === TRUE) {
                // Redirect back to the viewt.php page after successful update
                header("Location: viewtic.php");
                exit(); // Stop further execution
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
        
        // Display a form for updating ticket information
        // Populate the form fields with the current ticket information
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Ticket</title>
            <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
           
            min-height: 100vh;
          
        }
        .form-container {
            margin-top: 20vh;
            margin-bottom: 8vh;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
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
        h2
        {
            text-align: center;
        }
    </style>
        </head>
        <body>
        <h2>Update Ticket Information</h2>
        <div class="form-container">
          
            <form method="post">
                <input type="hidden" name="tkid" value="<?php echo $row['tkid']; ?>">
                Passenger ID: <input type="text" name="pid" value="<?php echo $row['PID']; ?>"><br>
                Train ID: <input type="text" name="tid" value="<?php echo $row['tid']; ?>"><br>
                Seat Number: <input type="text" name="seat_n" value="<?php echo $row['seat_n']; ?>"><br>
                Booking Date: <input type="text" name="booking_d" value="<?php echo $row['booking_d']; ?>"><br>
                Departure Location: <input type="text" name="dept" value="<?php echo $row['Dept']; ?>"><br>
               Station Id: <input type="text" name="sta" value="<?php echo $row['sta']; ?>"><br>
                <input type="submit" value="Update">
            </form>
            </div>
            <?php include('foot.php');?> 
        </body>
        </html>
        <?php
    } else {
        echo "0 results";
    }
} else {
    echo "Ticket ID (tkid) not provided";
}

// Close the database connection
$conn->close();
?>
