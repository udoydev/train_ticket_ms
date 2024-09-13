<?php include('dash.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Station Information</title>
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
    </style>
</head>
<body>
    <header>
        <!-- Your header content here -->
    </header>
    <div class="form-container">
        <form method="post">
            <?php
            include('coni.php');
            if(isset($_GET['sid'])) {
                $tid = $_GET['sid'];
                $sql = "SELECT * FROM station WHERE sid = $tid";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $d_station = $_POST['s_name'];
                        $a_station = $_POST['location'];
                        $update_sql = "UPDATE station SET s_name='$d_station', location='$a_station' WHERE sid='$tid'";
                        if ($conn->query($update_sql) === TRUE) {
                            header("Location: viewsta.php");
                            exit();
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                    }
                    echo "<input type='hidden' name='sid' value='".$row['sid']."'>";
                    echo "Departure Station: <input type='text' name='s_name' value='".$row['s_name']."'><br>";
                    echo "Arrival Station: <input type='text' name='location' value='".$row['location']."'><br>";
                    echo "<input type='submit' value='Update'>";
                } else {
                    echo "0 results";
                }
            } else {
                echo "Station ID (sid) not provided";
            }
            $conn->close();
            ?>
        </form>
    </div>
   
</body>
</html>
<?php include('foot.php'); ?>