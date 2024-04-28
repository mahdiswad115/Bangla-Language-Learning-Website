<?php
session_start();
include('dbconnect.php');
if (isset($_POST['feedback'])) {
    $user_id = $_SESSION['user_id'];
    $feedback = $_POST['feedback'];
    $sql = "INSERT INTO user_feedback (user_id, feedback_text) VALUES ('$user_id', '$feedback')";

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
