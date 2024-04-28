<?php
include('dbconnect.php'); 
$sql = "SELECT * FROM Exam WHERE Type = 'Live'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Exam_code'] . "</td>";
        echo "<td>" . $row['Date'] . "</td>";
        echo "<td>" . $row['Time'] . "</td>";
        echo "<td>" . $row['Category'] . "</td>";
        echo "<td>" . $row['Type'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No live exams found.</td></tr>";
}

$conn->close();
?>
