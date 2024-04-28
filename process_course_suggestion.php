<?php
session_start();
include('dbconnect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Suggestion Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .message-container {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            max-width: 400px;
        }

        .success {
            color: #155724;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
        }

        .error {
            color: #721c24;
            background-color: #f8d7da;
            padding: 10px;
            border-radius: 5px;
        }

        .message {
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <h1>Course Suggestion Result</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $course_name = $_POST['course_name'];
            $course_category = $_POST['course_category'];
            $instructor_id = $_SESSION['instructor_id'];
            $sql = "INSERT INTO suggested_courses (content, category, instructor_id) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $course_name, $course_category, $instructor_id);
            if ($stmt->execute()) {
                echo '<p class="message success">Course suggestion added successfully!</p>';
            } else {
                echo '<p class="message error">Error: ' . $conn->error . '</p>';
            }
            $stmt->close();
            $conn->close();
        } else {
            header("Location: course_suggestion.php");
            exit();
        }
        ?>
    </div>
</body>
</html>
