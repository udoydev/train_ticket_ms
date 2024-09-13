<?php
// Include database connection
include('coni.php');

// Function to generate PDF report
function generatePDFReport($passengerPID, $conn) {
    // Retrieve passenger information based on PID
    $sql = "SELECT passenger.PID, passenger.FNAME, passenger.LNAME, ticket.tid, ticket.Dept, ticket.sta, ticket.booking_d, ticket.seat_n, train.d_station AS departure_station, train.a_station AS arrival_station
            FROM passenger
            INNER JOIN ticket ON passenger.PID = ticket.PID
            INNER JOIN train ON ticket.tid = train.tid
            WHERE passenger.PID = $passengerPID";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Set response headers to indicate PDF content
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="passenger_report.pdf"');

        // Start PDF content
        ob_clean(); // Clear output buffer
        $pdfContent = '';

        // Add content to PDF
        while ($row = mysqli_fetch_assoc($result)) {
            // Format passenger information
            $passengerName = $row['FNAME'] . " " . $row['LNAME'];
            $passengerPID = $row['PID'];
            $trainID = $row['tid'];
            $departureStation = $row['departure_station'];
            $arrivalStation = $row['arrival_station'];
            $departureDate = $row['booking_d'];
            $seatNumber = $row['seat_n'];

            // Add passenger information to PDF content
            $pdfContent .= "Passenger Name: $passengerName\n";
            $pdfContent .= "Passenger ID: $passengerPID\n";
            $pdfContent .= "Train ID: $trainID\n";
            $pdfContent .= "Departure Station: $departureStation\n";
            $pdfContent .= "Arrival Station: $arrivalStation\n";
            $pdfContent .= "Departure Date: $departureDate\n";
            $pdfContent .= "Seat Number: $seatNumber\n\n";
        }

        // Output PDF content
        echo $pdfContent;
        exit(); // Stop further execution
    } else {
        echo "No data found for Passenger PID: $passengerPID";
    }
}

// Check if Passenger PID is provided via GET request
if (isset($_GET['passenger_pid'])) {
    $passengerPID = $_GET['passenger_pid'];
    generatePDFReport($passengerPID, $conn);
} else {
    echo "Passenger PID not provided";
}

// Close MySQL connection
mysqli_close($conn);
?>
