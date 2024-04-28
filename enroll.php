<?php
session_start();
include('dbconnect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['course_code'])) {
        $user_id = $_SESSION['user_id'];
        $course_code = $_POST['course_code'];

        $sql = "INSERT INTO Enrollment (user_id, Course_code) VALUES ('$user_id', '$course_code')";

        if ($conn->query($sql) === TRUE) {
            header("Location: course_content.php?course_code=$course_code");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Course code not provided.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
