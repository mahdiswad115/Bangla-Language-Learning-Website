<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Payments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            text-align: center;
            color: #333;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }
        
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .Active {
            background-color: green;
            color: white;
        }
        
        .Inactive {
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>User Payments</h1>
    <table>
        <tr>
            <th>Slip No</th>
            <th>Date</th>
            <th>Amount</th>
            <th>User ID</th>
            <th>Days Difference</th>
            <th>Membership Status</th> 
        </tr>
        
        <?php
        include('dbconnect.php');
        $sql = "SELECT *,
        CASE
            WHEN (COUNT(*) > 1) THEN -30
            ELSE DATEDIFF(CURRENT_DATE(), Date)
        END AS days_difference
    FROM payment
    GROUP BY user_id;";
        $result = $conn->query($sql);
       

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row["slip_no"]."</td>";
                echo "<td>".$row["Date"]."</td>";
                echo "<td>".$row["Amount"]."</td>";
                echo "<td>".$row["user_id"]."</td>";
                echo "<td>".$row["days_difference"]."</td>";
                echo "<td>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='user_id' value='".$row["user_id"]."'>";
                echo "<button class='btn Active' type='submit' name='membership_status' value='Active'>Active</button>";
                echo "<button class='btn Inactive' type='submit' name='membership_status' value='Inactive'>Inactive</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>0 results</td></tr>";
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $user_id = $_POST['user_id'];
            $membership_status = $_POST['membership_status'];
            $sql_update = "UPDATE users SET membership_status = '$membership_status' WHERE user_id = '$user_id'";
            if ($conn->query($sql_update) === TRUE) {
                echo 'Membership status updated successfully';
            } else {
                echo "Error: " . $sql_update . "<br>" . $conn->error;
            }
        }

        $conn->close();
        ?>
    </table>
</div>

</body>
</html>
