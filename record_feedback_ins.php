<?php
session_start();
include('dbconnect.php');
if (isset($_POST['feedback'])) {
    $instructor_id = $_SESSION['instructor_id'];
    $feedback = $_POST['feedback'];
    $sql = "INSERT INTO instructor_feedback (instructor_id, feedback_text) VALUES ('$instructor_id', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo "<div style='text-align: center; font-size: 1.5em; color: green;'>Feedback recorded successfully!</div>";
    } else {
        echo "<div style='text-align: center; font-size: 1.5em; color: red;'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $conn->close();
} else {
    echo "<div style='text-align: center; font-size: 1.5em; color: orange;'>Feedback not provided.</div>";
}
?>

