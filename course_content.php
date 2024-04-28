<?php
session_start();
include('dbconnect.php');
if (!isset($_GET['course_code'])) {
    echo "Course code not provided.";
    exit();
}

$course_code = $_GET['course_code'];
$sql = "SELECT * FROM Courses WHERE Course_code = '$course_code'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $course = $result->fetch_assoc();
} else {
    echo "Course not found.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Content</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
            color: #333;
        }
        p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Course Content - <?php echo $course['Content']; ?></h2>
        <h3>Course Materials</h3>
    </div>
</body>
</html>
