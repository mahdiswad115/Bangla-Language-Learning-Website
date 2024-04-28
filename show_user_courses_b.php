<?php
session_start();
include('dbconnect.php');

$user_id = $_SESSION['user_id'];

if (isset($_POST['delete_course'])) {
    $Course_code = $_POST['Course_code'];
    $delete_sql = "DELETE FROM enrollment WHERE user_id = $user_id AND Course_code = $Course_code";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Course deleted successfully!');</script>";
    } else {
        echo "<script>alert('Error deleting course: " . $conn->error . "');</script>";
    }
}
$sql = "SELECT enrollment.Course_code, courses.Content
        FROM enrollment
        INNER JOIN courses ON enrollment.Course_code = courses.Course_code
        WHERE enrollment.user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["Course_code"]."</td>";
        echo "<td>".$row["Content"]."</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='Course_code' value='" . $row["Course_code"] . "'>";
        echo "<input type='submit' class='delete-btn' name='delete_course' value='Delete'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No courses found</td></tr>";
}

$conn->close();
?>
