<?php
include('dash.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registry Management</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
      body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            height: 50vh;
            background-color: yellowgreen;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
            
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            border: 3px solid black; /* Add border */
            
        }

        th, td {
            padding: 10px;
            
            border-bottom: 1px solid #ddd;
            border: 3px solid #333; /* Add border */
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        input[type="text"],
        input[type="submit"],
        input[type="button"] {
            padding: 8px 15px;
            border: none;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 19px;
        }
        #hell{
            padding: 8px 15px;
            border: none;
            background-color: #333;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            margin-top: 19px;
        }

        input[type="text"] {
            width: 200px;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #555;
        }
#hell:hover

{
    background-color: gray;
    font-weight: bolder;
 

}

    </style>
</head>
<body>
<header>
    <h1>Railway Management</h1>
</header>

<div class="container">
    <form action="" method="GET">
        <label for="passenger_id">Passenger ID:</label>
        <input type="text" id="passenger_id" name="passenger_id">
        <input type="submit" value="Search">
    </form>

    <div id="printableArea">
        <center>All copyright Reserved</center>
        <table border="10" style=" background-color:aquamarine;  text-align:center; width:40vh; margin:auto;
        height:10vh;
        ">
            <tr style=" background-color:aquamarine;">
                <th style=" height:10vh; background-color:green;">Passenger ID</th>
                <th style=" height:10vh; background-color:green;">Passenger Name</th>
                <th style=" height:10vh; background-color:green;">Train ID</th>
                <th style=" height:10vh; background-color:green;">Departure Station</th>
                <th style=" height:10vh; background-color:green;">Arrival Station</th>
                <th style=" height:10vh; background-color:green;">Departure Date</th>
                <th style=" height:10vh; background-color:green;">Seat Number</th>
                <th style=" height:10vh; background-color:green;">Arrival Time</th>
            </tr>
            <?php
            // Include database connection
            include('coni.php');

            // Check if Passenger ID is provided via GET request
            if (isset($_GET['passenger_id'])) {
                $passengerID = $_GET['passenger_id'];

                // Retrieve passenger information based on ID
                $sql = "SELECT passenger.PID, passenger.FNAME, passenger.LNAME, ticket.tid, ticket.Dept, ticket.sta, ticket.booking_d, ticket.seat_n,train.a_time, train.d_station AS departure_station, train.a_station AS arrival_station
                            FROM passenger
                            INNER JOIN ticket ON passenger.PID = ticket.PID
                            INNER JOIN train ON ticket.tid = train.tid
                            WHERE passenger.PID = $passengerID";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['PID'] . "</td>";
                        echo "<td>" . $row['FNAME'] . " " . $row['LNAME'] . "</td>";
                        echo "<td>" . $row['tid'] . "</td>";
                        echo "<td>" . $row['departure_station'] . "</td>";
                        echo "<td>" . $row['arrival_station'] . "</td>";
                        echo "<td>" . $row['booking_d'] . "</td>";
                        echo "<td>" . $row['seat_n'] . "</td>";
                        echo "<td>" . $row['a_time'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No data found for Passenger ID: $passengerID</td></tr>";
                }

                // Close connection
                mysqli_close($conn);
            }
            ?>
        </table>
    </div>

    <?php if (isset($passengerID)): ?>
        <input type="button" onclick="printDiv('printableArea')" value="Print">
    <?php endif; ?>
    <button id="hell" type="button" onclick="window.location.href='./report.php'">Back</button>
</div>

<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
</body>
<footer>
                <?php include('foot.php'); ?>
            </footer>
</html>
