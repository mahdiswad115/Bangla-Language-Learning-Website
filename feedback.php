<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> 
    <style>
        body {
            background-color: #f8f9fa; 
            color: #333; 
            font-family: Arial, sans-serif; 
        }

        .container {
            padding: 20px; 
            margin-top: 50px; 
        }

        h2 {
            color: #007bff;
            margin-bottom: 20px; 
        }

        table {
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 30px; 
        }

        th, td {
            padding: 12px 15px; 
            text-align: left; 
            border-bottom: 1px solid #dee2e6;
        }

        thead {
            background-color: #007bff; 
            color: #fff; 
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e9ecef; 
        }

        .no-feedback {
            font-style: italic; 
            color: #6c757d; 
        }
    </style>
</head>
<body>
<div class="container">
    <h2>User Feedback</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">User ID</th>
                <th scope="col">Feedback Text</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('dbconnect.php');

            $sql = "SELECT user_id, feedback_text FROM user_feedback";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["user_id"] . "</td>";
                    echo "<td>" . $row["feedback_text"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2' class='no-feedback'>No feedback available</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

    <h2>Instructor Feedback</h2>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Instructor ID</th>
                <th scope="col">Feedback Text</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('dbconnect.php');

            $sql = "SELECT instructor_id, feedback_text FROM instructor_feedback";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["instructor_id"] . "</td>";
                    echo "<td>" . $row["feedback_text"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='2' class='no-feedback'>No feedback available</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
