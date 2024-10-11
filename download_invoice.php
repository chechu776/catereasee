<?php
require('vendor/autoload.php'); // Include FPDF library

if (isset($_GET['booking_id']) && isset($_GET['menu_id'])) {
    $booking_id = $_GET['booking_id'];
    $menu_id = $_GET['menu_id'];

    // Database connection
    $dbconnect = mysqli_connect("localhost", "root", "", "caterease");

    if (!$dbconnect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch booking details
    $query = "
        SELECT booking_id, total_price, advance_payment, event_date, csp_id
        FROM bookings
        WHERE booking_id = '$booking_id'";
    
    $result = mysqli_query($dbconnect, $query);
    
    if (!$result || mysqli_num_rows($result) == 0) {
        die('Booking not found!');
    }
    
    $booking_data = mysqli_fetch_assoc($result);

    // Fetch CSP details using the csp_id from the previous query
    $csp_id = $booking_data['csp_id'];
    $csp_query = "SELECT csp_name FROM csp_table WHERE csp_id = '$csp_id'";
    $csp_result = mysqli_query($dbconnect, $csp_query);
    
    if (!$csp_result || mysqli_num_rows($csp_result) == 0) {
        die('CSP not found!');
    }
    
    $csp_data = mysqli_fetch_assoc($csp_result);

    // Fetch CSP contact information from the user table
    $user_query = "SELECT phno, email FROM user WHERE userid = (SELECT userid FROM csp_table WHERE csp_id = '$csp_id')";
    $user_result = mysqli_query($dbconnect, $user_query);
    
    if (!$user_result || mysqli_num_rows($user_result) == 0) {
        die('CSP contact information not found!');
    }
    
    $user_data = mysqli_fetch_assoc($user_result);

    // Fetch ordered menu items for this booking
    $menu_query = "
        SELECT m.menu_name, m.price, b.quantity 
        FROM menu m 
        JOIN bookings b ON m.menu_id = b.menu_id 
        WHERE b.booking_id = '$booking_id' AND m.menu_id = '$menu_id'";
    
    $menu_result = mysqli_query($dbconnect, $menu_query);
    
    if (!$menu_result || mysqli_num_rows($menu_result) == 0) {
        die('Menu items not found!');
    }

    // Initialize PDF
    $pdf = new FPDF();
    $pdf->AddPage();

    // CaterEase Title
    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(190, 10, 'CaterEase Invoice', 0, 1, 'C'); // Centered title
    $pdf->Ln(5);

    // CSP Details
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(100, 10, 'Catering Service Provider:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(100, 10, 'CSP Name: ' . $csp_data['csp_name'], 0, 1);
    $pdf->Cell(100, 10, 'Contact: ' . $user_data['phno'], 0, 1);
    $pdf->Cell(100, 10, 'Email: ' . $user_data['email'], 0, 1);
    $pdf->Ln(5);

    // Booking and Event Details
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(100, 10, 'Booking Details:', 0, 1);
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(100, 10, 'Booking ID: ' . $booking_data['booking_id'], 0, 1);
    $pdf->Cell(100, 10, 'Event Date: ' . $booking_data['event_date'], 0, 1);
    $pdf->Ln(5);

    // Table Header
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(80, 10, 'Menu Item', 1);
    $pdf->Cell(30, 10, 'Quantity', 1);
    $pdf->Cell(40, 10, 'Price (₹)', 1);
    $pdf->Ln();

    // Menu Items Loop
    $pdf->SetFont('Arial', '', 12);
    $total = 0;
    while ($menu_row = mysqli_fetch_assoc($menu_result)) {
        $pdf->Cell(80, 10, $menu_row['menu_name'], 1);
        $pdf->Cell(30, 10, $menu_row['quantity'], 1, 0, 'C');
        $price_with_service_charge = $menu_row['price'] + ($menu_row['price'] * 0.05); // Assuming 5% service charge
        $pdf->Cell(40, 10, '₹' . number_format($price_with_service_charge, 2), 1, 0, 'R');
        $pdf->Ln();
        $total += $price_with_service_charge * $menu_row['quantity'];
    }

    // Service Charge Calculation
    $pdf->Ln(5);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(110, 10, 'Total Amount:', 0, 0, 'R');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, '₹' . number_format($total, 2), 0, 1, 'R');

    $paid_amount = $booking_data['advance_payment'];
    $balance = $total - $paid_amount;

    $pdf->Cell(110, 10, 'Paid Amount:', 0, 0, 'R');
    $pdf->Cell(40, 10, '₹' . number_format($paid_amount, 2), 0, 1, 'R');

    $pdf->Cell(110, 10, 'Balance to be Paid:', 0, 0, 'R');
    $pdf->Cell(40, 10, '₹' . number_format($balance, 2), 0, 1, 'R');

    // Output PDF
    $pdf->Output();
} else {
    die('Booking ID or Menu ID not set.');
}
?>
