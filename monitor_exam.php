<?php
session_start();
include('dbconnect.php');

$sql_instructor = "SELECT exam_code, instructor_id FROM live_exam";
$result_instructor = $conn->query($sql_instructor);


$sql_user = "SELECT exam_code, user_id FROM user_exams";
$result_user = $conn->query($sql_user);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Exams</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Exam Details</h2>
    <table>
        <tr>
            <th>Exam Code</th>
            <th>Instructor ID</th>
            <th>User ID</th>
        </tr>
        <?php 
        $common_exams = array();
        while ($row = $result_instructor->fetch_assoc()) {
            $common_exams[$row['exam_code']]['instructor_id'] = $row['instructor_id'];
        }
        while ($row = $result_user->fetch_assoc()) {
            if (isset($common_exams[$row['exam_code']])) {
                $common_exams[$row['exam_code']]['user_id'] = $row['user_id'];
            }
        }
        foreach ($common_exams as $exam_code => $details) {
            echo "<tr>";
            echo "<td>{$exam_code}</td>";
            echo "<td>{$details['instructor_id']}</td>";
            echo "<td>{$details['user_id']}</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
