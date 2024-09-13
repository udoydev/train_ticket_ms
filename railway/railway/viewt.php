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
        <h2>Train Info</h2>
        <table>

            <tr>
                <th>Train Id</th>
                <th>Departure Station </th>
                <th>Arrival Station</th>
                <th>Arrival Time</th>
                <th>Delete</th>
                <th> Update</th>

            </tr>
            <?php






            include('coni.php');
            $sql = "SELECT * FROM train";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" .
                        $row["tid"] . "</td><td>" .
                        $row["d_station"] . "</td><td>" .
                        $row["a_station"] . "</td><td>" .
                        $row["a_time"] .  "</td>" .
                        "<td class='up'><a href='delt.php?tid=" . $row["tid"] . "'>Delete</a></td>" .
                        "<td class='ups'><a href='upta.php?tid=" . $row["tid"] . "'>Update</a></td></tr>";
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