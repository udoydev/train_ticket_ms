
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <style>
        body {
           
            text-align: center;
            background-color: gray;
          
    position: relative;
    min-height: 100vh;
    
}

footer {
    
    position: sticky;
    bottom: 0;
    left: 0;
    width: 100%;
}

        
        table {
            border-collapse: collapse;
            border: 2px solid red;
            width: 60%;
            margin: 20px auto;
            background-color: beige ;
            overflow: scroll;
            margin-bottom: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
            border: 2px solid red;
        }
        th{
            background-color: greenyellow;
            
        }
       
        form {
            margin-bottom: 20px;
        }
        label
{
    font-weight: bolder;
}
input
{
    background-color: rgb(255, 255, 255);
    width: 200px;
    border-radius: 5px;
    border: 2px solid red;
}
button
{
    width: 100px;
    text-align: center;
    background-color: rgb(69, 115, 117);
    border-radius: 20px;
    margin-top: 20px;
   
    cursor: pointer;
    transition: all 0.3s ease;
}
button:hover
{
    width: 110px; ;
    text-align: center;
    background-color: rgb(245, 255, 255);
    color: black;
}
.jj
{
 height: 60vh;
}
    </style>
</head>
<body>
<?php include ('dash.php');?>
    <br><br>
    <h2>Search by Passenger ID</h2><br>

    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
       
       <label for="tkid">PID:</label>
       <input type="text" id="tkid" name="tkid">
       <!-- <input type="submit" value="Search"> -->
       <button type="submit">Search</button>

   </form>

    <?php
include('coni.php');



    $sql = "SELECT * FROM ticket";
    if (isset($_GET['tkid']) && !empty($_GET['tkid'])) {
        $id = $_GET['tkid'];
        $sql .= " WHERE tkid = $id";
    }

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) >0) {
        echo "<div class='jj'><table>
        <tr>
        <th>Ticket Id</th>
        <th>PID</th>
        <th>Train ID</th>
        <th>Seat Number</th>
        <th>Booking Date</th>
        <th>Departure Station</th>
        <th>Station ID</th>
      
       
        </tr>";
    
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr><td>" . $row["tkid"] . "</td><td>" . $row["PID"] . "</td><td>" . $row["tid"] .
            "</td><td>" . $row["seat_n"] ."</td><td>" . $row["booking_d"] ."</td><td>". $row["Dept"] ."</td><td>". $row["sta"] ."</td></tr>"  ;
        }
        echo "</table></div>";
    } else {
        echo "0 results";
    }

 
    mysqli_close($conn);
    ?>
<footer>
<?php include ('foot.php');?>
</footer>
</body>
</html>
