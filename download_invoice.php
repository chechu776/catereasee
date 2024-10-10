<?php
require('fpdf/fpdf.php'); // Include FPDF library

if (isset($_GET['booking_id'])) {
    $booking_id = $_GET['booking_id'];

    $dbconnect = mysqli_connect("localhost", "root", "", "caterease");

    if (!$dbconnect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch booking details
    $query = "SELECT * FROM bookings WHERE booking_id = '$booking_id'";
    $result = mysqli_query($dbconnect, $query);
    $booking_data = mysqli_fetch_assoc($result);

    // Fetch CSP name based on the csp_id in the booking
    $csp_id = $booking_data['csp_id'];
    $csp_query = "SELECT csp_name FROM csp_table WHERE csp_id = '$csp_id'";
    $csp_result = mysqli_query($dbconnect, $csp_query);
    $csp_data = mysqli_fetch_assoc($csp_result);
    $csp_name = $csp_data['csp_name']; // Get CSP name

    // Create a PDF
    $pdf = new FPDF();
    $pdf->AddPage();
    
    // Invoice Title
    $pdf->SetFont('Arial', 'B', 16); // Changed to Arial
    $pdf->Cell(40, 10, 'Invoice');
    
    // Booking details
    $pdf->Ln(10);
    $pdf->SetFont('Arial', '', 12); // Changed to Arial
    $pdf->Cell(40, 10, 'Booking ID: ' . $booking_data['booking_id']);
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'CSP Name: ' . $csp_name); // Display CSP name
    $pdf->Ln(10);
    $pdf->Cell(40, 10, 'Amount: ₹' . $booking_data['total_price']);
    // Add more details as needed

    $pdf->Output();
}
?>
