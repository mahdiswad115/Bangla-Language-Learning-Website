<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suggested Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .message {
            color: #666;
            font-style: italic;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        include('dbconnect.php');
        $sql = "SELECT * FROM suggested_courses";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            echo "<h2>Suggested Courses</h2>";
            echo "<table>";
            echo "<tr><th>Course Content</th><th>Course Category</th></tr>";


            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["Content"]. "</td><td>" . $row["Category"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='message'>No suggested courses found.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
