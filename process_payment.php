<?php
session_start();
include('dbconnect.php');
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['amount']) && isset($_POST['payment_method'])) {
        $amount = $_POST['amount'];
        $payment_method = $_POST['payment_method'];
        $conn = new mysqli("localhost", "root", "", "banglalanguage");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $user_id = $_SESSION['user_id'];
        $sql = "INSERT INTO Payment (Date, Amount, user_id) VALUES (CURDATE(), '$amount','$user_id')";

        if ($conn->query($sql) === TRUE) {
            $message = "Payment successful!";
            $check_status_sql = "SELECT Membership_status FROM Users WHERE user_id = '$user_id'";
            $result = $conn->query($check_status_sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if ($row['Membership_status'] == "Inactive") {
                    $update_status_sql = "UPDATE Users SET Membership_status = 'Active' WHERE user_id = '$user_id'";
                    if ($conn->query($update_status_sql) === TRUE) {
                        $message .= "<br>Membership status updated to Active.";
                    } else {
                        $error_message = "Error updating Membership status: " . $conn->error;
                    }
                }
            }
        } else {
            $error_message = "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    } else {
        $error_message = "Amount and payment method are required.";
    }
} else {
    $error_message = "Invalid request.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .message-box {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h2><?php echo $message; ?></h2>
    </div>
</body>
</html>

