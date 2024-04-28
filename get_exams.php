<?php
include('dbconnect.php');
$sql = "SELECT * FROM Exam";
$result = $conn->query($sql);
if ($result->num_rows != 0) {
    $exams = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $exams = [];
}

$conn->close();
?>