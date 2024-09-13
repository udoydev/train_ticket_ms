<?php include('dash.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Train Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .form-container {
            margin-top: -13vh;
            margin-bottom: -22vh;
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
        <!-- Your header content here -->
    </header>
    <div class="form-container">
        <form method="post">
            <?php
            include('coni.php');
            if(isset($_GET['tid'])) {
                $tid = $_GET['tid'];
                $sql = "SELECT * FROM train WHERE tid = $tid";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $d_station = $_POST['d_station'];
                        $a_station = $_POST['a_station'];
                        $a_time = $_POST['a_time'];
                        $update_sql = "UPDATE train SET d_station='$d_station', a_station='$a_station', a_time='$a_time' WHERE tid='$tid'";
                        if ($conn->query($update_sql) === TRUE) {
                            header("Location: viewt.php");
                            exit();
                        } else {
                            echo "Error updating record: " . $conn->error;
                        }
                    }
                    echo "<input type='hidden' name='tid' value='".$row['tid']."'>";
                    echo "Departure Station: <input type='text' name='d_station' value='".$row['d_station']."'><br>";
                    echo "Arrival Station: <input type='text' name='a_station' value='".$row['a_station']."'><br>";
                    echo "Arrival Time: <input type='text' name='a_time' value='".$row['a_time']."'><br>";
                    echo "<input type='submit' value='Update'>";
                } else {
                    echo "0 results";
                }
            } else {
                echo "Train ID (tid) not provided";
            }
            $conn->close();
            ?>
        </form>
    </div>
</body>
</html>
<?php include('foot.php'); ?>
