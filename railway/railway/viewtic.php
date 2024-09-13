<?php include('dash.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>document</title>
    <style>
        .table-wrapper {
            height: 87vh;
            background-color: #7494b1;
        }

        body {
            background-color: whitesmoke;
            position: relative;
            min-height: 100vh;

        }

        table {
            border-collapse: collapse;
            width: 60%;
            margin: auto;
            background-color: greenyellow;


        }

        th,
        td {
            border: 3px solid;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: gainsboro;
        }

        h2 {
            text-align: center;
        }

        footer {

            position: sticky;
            bottom: 0;
            left: 0;
            width: 100%;


        }
        .up{
            background-color: red;
        }
        .ups{
            background-color: green;
        }
    </style>
</head>

<body>


    <div class="table-wrapper">

        <center>
            <h1>Railway mangement system</h1>
        </center>
        <h2>Ticket Info</h2>
        <table>

            <tr>
                <th>Ticket Id</th>
                <th>Passenger id </th>
                <th>Train Id</th>
                <th>Seat Number</th>
                <th>Booking Date</th>
                <th>Departure location</th>
                <th>Station Id</th>
                <th>Delete</th>
                <th> Update</th>

            </tr>
            <?php






            include('coni.php');
            $sql = "SELECT * FROM ticket";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" .
                        $row["tkid"] . "</td><td>" .
                        $row["PID"] . "</td><td>" .
                        $row["tid"] . "</td><td>" .
                        $row["seat_n"] .  "</td><td>" .
                        $row["booking_d"] .  "</td><td>" .
                        $row["Dept"] .  "</td><td>" .
                        $row["sta"] .  "</td>" .
                        "<td class='up'><a href='detic.php?tkid=" . $row["tkid"] . "'>Delete</a></td>" .
                        "<td class='ups'><a href='uptic.php?tkid=" . $row["tkid"] . "'>Update</a></td></tr>";
                }
                echo "</table></div>";
            } else {
                echo "";
            }
            $conn->close();
            ?>
            <footer>
                <?php include('foot.php'); ?>
            </footer>
</body>

</html>