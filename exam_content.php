<?php
session_start();

if (!isset($_GET['exam_code'])) {
    echo "Exam code not provided.";
    exit();
}
$exam_code = $_GET['exam_code'];

include('dbconnect.php');
$user_id = $_SESSION['user_id'];
$sql = "INSERT INTO User_Exams (user_id, Exam_code) VALUES ('$user_id', '$exam_code')";

if ($conn->query($sql) === TRUE) {
    $message = "Exam successfully taken!";
} else {
    $error_message = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Taken</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .message-box {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #28a745;
            color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="message-box">
        <h2><?php echo isset($message) ? $message : $error_message; ?></h2>
    </div>
</body>
</html>
