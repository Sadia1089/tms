<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Change this if necessary
$password = ""; // Change this if necessary
$dbname = "tms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['full_name'];
    $student_id = $_POST['student_id'];
    $level_term = $_POST['level_term'];
    $transaction_id = $_POST['transaction_id'] ?? '';
    $payment_method = $_POST['payment_method'];
    $payment_slip = $_POST['payment_slip'] ?? '';
    $status = "pending";

    // Insert data into database
    $sql = "INSERT INTO transactions (full_name, student_id, level_term, transaction_id, payment_method, payment_slip, status)
            VALUES ('$full_name', '$student_id', '$level_term', '$transaction_id', '$payment_method', '$payment_slip', '$status')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Payment submitted successfully!')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_PAYPAL_CLIENT_ID"></script>
</head>
<body>
<div class="container mt-5">
    <h2>Transaction Form</h2>
    <form id="transaction-form" action="submit_transaction.php" method="post">
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
        </div>
        <div class="form-group">
            <label for="student_id">Student ID</label>
            <input type="text" class="form-control" id="student_id" name="student_id" required>
        </div>
        <div class="form-group">
            <label for="level_term">Level/Term</label>
            <input type="text" class="form-control" id="level_term" name="level_term" required>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select class="form-control" id="payment_method" name="payment_method" required>
                <option value="paypal">PayPal</option>
                <option value="bank">Bank Transfer</option>
            </select>
        </div>
        <div class="form-group" id="payment-slip-group" style="display: none;">
            <label for="payment_slip">Payment Slip</label>
            <input type="text" class="form-control" id="payment_slip" name="payment_slip">
        </div>
        <input type="hidden" id="transaction_id" name="transaction_id">
        <div id="paypal-button-container" class="mt-3" style="display: none;"></div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
<script>
    document.getElementById('payment_method').addEventListener('change', function() {
        const method = this.value;
        const paypalContainer = document.getElementById('paypal-button-container');
        const slipGroup = document.getElementById('payment-slip-group');

        if (method === 'paypal') {
            paypalContainer.style.display = 'block';
            slipGroup.style.display = 'none';
        } else if (method === 'bank') {
            paypalContainer.style.display = 'none';
            slipGroup.style.display = 'block';
        } else {
            paypalContainer.style.display = 'none';
            slipGroup.style.display = 'none';
        }
    });

    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '10.00' // Set the payment amount here
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Capture the transaction ID
                document.getElementById('transaction_id').value = details.id;
                alert('Transaction completed by ' + details.payer.name.given_name);
            });
        },
        onCancel: function(data) {
            alert('Transaction was cancelled.');
        },
        onError: function(err) {
            console.error(err);
            alert('An error occurred during the transaction.');
        }
    }).render('#paypal-button-container'); // Render the PayPal button
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
