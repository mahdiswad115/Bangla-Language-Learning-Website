<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
        }
        .pay-button, .not-pay-button {
            padding: 6px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .pay-button {
            background-color: #28a745;
            color: white;
        }
        .not-pay-button {
            background-color: #dc3545;
            color: white;
        }
        .pay-button:hover, .not-pay-button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <h2>Instructor Payment Details</h2>
    <table>
        <tr>
            <th>Instructor ID</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Joining Date</th>
            <th>Amount</th>
            <th>Days Count</th>
            <th>Payment Status</th>
        </tr>
        <?php
        include('dbconnect.php');
        function updatePaymentEligibility($instructor_id, $payment_eligibility) {
            global $conn;
            $sql = "UPDATE instructor SET payment_eligibility = $payment_eligibility WHERE instructor_id = $instructor_id";
            if ($conn->query($sql) === TRUE) {
                return true;
            } else {
                return false;
            }
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['pay'])) {
                $instructor_id = $_POST['instructor_id'];
                updatePaymentEligibility($instructor_id, 1);
            } elseif (isset($_POST['not_pay'])) {
                $instructor_id = $_POST['instructor_id'];
                updatePaymentEligibility($instructor_id, 0);
            }
        }
        $sql = "SELECT instructor_id, Name, Phone_Number, joining_date FROM instructor";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $joining_date = new DateTime($row['joining_date']);
                $current_date = new DateTime();
                $days_count = $current_date->diff($joining_date)->format("%a");
                echo "<tr>";
                echo "<td>" . $row["instructor_id"] . "</td>";
                echo "<td>" . $row["Name"] . "</td>";
                echo "<td>" . $row["Phone_Number"] . "</td>";
                echo "<td>" . $row["joining_date"] . "</td>";
                echo "<td>100</td>";
                echo "<td>" . $days_count . "</td>";
                echo "<td class='button-container'>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='instructor_id' value='" . $row["instructor_id"] . "'>";
                echo "<button type='submit' class='pay-button' name='pay'>Pay</button>";
                echo "<button type='submit' class='not-pay-button' name='not_pay'>Not Pay</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No data available</td></tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
