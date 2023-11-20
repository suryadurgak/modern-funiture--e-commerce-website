<?php
session_start();
include("./include/conn.php");

// Check if the session contains the order ID (OID)
if(isset($_SESSION['OID'])){
    $orderId = $_SESSION['OID'];
    
    // Retrieve payment data based on the order ID from the database
    $result = mysqli_query($conn, "SELECT name, amount, payment_status, added_on, payment_id FROM payment WHERE id='$orderId'");
    $paymentData = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 20px auto; /* Center the table */
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Payment Details</h1>
    <?php if (isset($paymentData)) { ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Amount</th>
            <th>Payment Status</th>
            <th>Added On</th>
            <th>Payment ID</th>
			<th>Action</th>
        </tr>
        <tr>
            <td><?php echo $paymentData['name']; ?></td>
            <td><?php echo $paymentData['amount']; ?></td>
            <td><?php echo $paymentData['payment_status']; ?></td>
            <td><?php echo $paymentData['added_on']; ?></td>
            <td><?php echo $paymentData['payment_id']; ?></td>
			<td> <a href="cancel.php"> cancel</a></td>
        </tr>
    </table>

    <!-- Add a download button to export the table as CSV -->

    
    <?php } else { ?>
    <p>No payment data found.</p>
    <?php } ?>
</body>
</html>
