<?php
session_start();
include('dbconnect.php');
$sql = "SELECT * FROM Courses";
$result = $conn->query($sql);

$courses = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
}

$conn->close();
?>