<?php include ('dash.php');?>
<?php



// Define a basic PDF class
class PDF {
    // Add a page to the PDF
    function AddPage() {
        // Add page logic
    }

    // Set font for the PDF
    function SetFont($font, $style, $size) {
        // Set font logic
    }

    // Output text in the PDF
    function Cell($w, $h, $txt, $border, $ln) {
        // Output text logic
        echo "<tr><td>$txt</td></tr>"; // Output as HTML table row for demonstration purposes
    }

    // Output the PDF
    function Output() {
        // Output PDF logic
    }
}

// Function to generate and output PDF
function generateTrainTicketPDF($ticketInfo) {
    // Output as HTML table
    echo "<table>";
    foreach ($ticketInfo as $key => $value) {
        echo "<tr><td><strong>$key:</strong></td><td>$value</td></tr>";
    }
    echo "</table>";
}

// Check if PID is submitted via form
if(isset($_POST['submit'])) {
    $PID = $_POST['PID'];
    
    // Fetch ticket information based on PID
    include('coni.php'); // Include database connection file
    $sql = "SELECT ticket.*, train.a_time FROM ticket 
            INNER JOIN train ON ticket.tid = train.tid 
            WHERE PID = '$PID'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Prepare ticket information
        $ticketInfo = [
            'Train ID' => $row['tid'],
            'Seat Number' => $row['seat_n'],
            'Booking Date' => $row['booking_d'],
            'Departure Time' => $row['a_time']
        ];
        // Generate PDF
        generateTrainTicketPDF($ticketInfo);
    } else {
        echo "No ticket found for the given PID.";
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Train Ticket</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        #ticketInfo {
            display: none;
        }

        #printButton, #downloadButton {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Generate Train Ticket</h1>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="PID">Enter Passenger ID:</label>
            <input type="text" id="PID" name="PID" required>
            <button type="submit" name="submit">Generate Ticket</button>
        </form>
        
        <!-- Ticket information section -->
        <div id="ticketInfo">
            <h2>Ticket Information</h2>
            <table>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
                <tr>
                    <td>Train ID</td>
                    <td id="trainID"></td>
                </tr>
                <tr>
                    <td>Seat Number</td>
                    <td id="seatNumber"></td>
                </tr>
                <tr>
                    <td>Booking Date</td>
                    <td id="bookingDate"></td>
                </tr>
                <tr>
                    <td>Departure Time</td>
                    <td id="departureTime"></td>
                </tr>
            </table>

            <!-- Print and download buttons -->
            <button id="printButton">Print Ticket</button>
            <button id="downloadButton">Download Ticket</button>
        </div>
    </div>

    <script>
        // Function to show ticket information and buttons
        function showTicketInfo(ticketInfo) {
            // Display ticket information
            document.getElementById('trainID').innerText = ticketInfo['Train ID'];
            document.getElementById('seatNumber').innerText = ticketInfo['Seat Number'];
            document.getElementById('bookingDate').innerText = ticketInfo['Booking Date'];
            document.getElementById('departureTime').innerText = ticketInfo['Departure Time'];

            // Show ticket information and buttons
            document.getElementById('ticketInfo').style.display = 'block';
            document.getElementById('printButton').style.display = 'inline-block';
            document.getElementById('downloadButton').style.display = 'inline-block';
        }

        // Function to print the ticket
        function printTicket() {
            // Create a new window with only the ticket information
            var ticketWindow = window.open('', '_blank');
            ticketWindow.document.write('<html><head><title>Train Ticket</title></head><body>');
            ticketWindow.document.write(document.getElementById('ticketInfo').innerHTML);
            ticketWindow.document.write('</body></html>');
            ticketWindow.document.close();
            // Print the ticket
            ticketWindow.print();
        }

        // Function to download the ticket
        function downloadTicket() {
            // Create a blob with the ticket information
            var ticketBlob = new Blob([document.getElementById('ticketInfo').innerHTML], { type: 'text/html' });
            // Create a temporary link element to trigger download
            var downloadLink = document.createElement('a');
            downloadLink.href = URL.createObjectURL(ticketBlob);
            downloadLink.download = 'train_ticket.html';
            downloadLink.click();
        }

        // Attach event listeners to print and download buttons
        document.getElementById('printButton').addEventListener('click', printTicket);
        document.getElementById('downloadButton').addEventListener('click', downloadTicket);
    </script>
</body>
</html>


<?php include ('foot.php');?>