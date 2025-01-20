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
    $transaction_id = $_POST['transaction_id'];
    $status = $_POST['status'];

    // Update transaction status
    $sql = "UPDATE transactions SET status='$status' WHERE id='$transaction_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Transaction updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Payment List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Students Payment List</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Full Name</th>
            <th>Student ID</th>
            <th>Level/Term</th>
            <th>Transaction ID</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM transactions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['full_name']}</td>
                        <td>{$row['student_id']}</td>
                        <td>{$row['level_term']}</td>
                        <td>{$row['transaction_id']}</td>
                        <td>{$row['status']}</td>
                        <td>
                            <form action='' method='post'>
                                <input type='hidden' name='transaction_id' value='{$row['id']}'>
                                <select name='status' class='form-control'>
                                    <option value='pending' " . ($row['status'] == 'pending' ? 'selected' : '') . ">Pending</option>
                                    <option value='approved' " . ($row['status'] == 'approved' ? 'selected' : '') . ">Approved</option>
                                </select>
                                <button type='submit' class='btn btn-primary mt-2'>Update</button>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No transactions found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
$conn->close();
?>
