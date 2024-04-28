<?php
include('dbconnect.php');
if(isset($_POST['insert'])){
    $course_Content = $_POST['Content'];
	$course_Category = $_POST['Category'];
    $sql = "INSERT INTO courses ( Content,Category) VALUES ( '$course_Content','$course_Category')";
    if ($conn->query($sql) === TRUE) {
        echo "New course created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
if(isset($_POST['update'])){
    $course_code = $_POST['course_code'];
    $course_Content = $_POST['Content'];
    $course_Category = $_POST['Category'];
    
    $sql = "UPDATE courses SET Content=?, Category=? WHERE course_code=?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $course_Content, $course_Category, $course_code);
    
    if ($stmt->execute()) {
        echo "Course updated successfully";
    } else {
        echo "Error updating course: " . $stmt->error;
    }
}
if(isset($_POST['delete'])){
    $course_code = $_POST['course_code'];
    $sql = "DELETE FROM courses WHERE course_code='$course_code'";
    if ($conn->query($sql) === TRUE) {
        echo "Course deleted successfully";
    } else {
        echo "Error deleting course: " . $conn->error;
    }
}

$conn->close(); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Courses</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 0px 10px #bbb;
        }

        ul {
            list-style-type: none;
        }

        li {
            margin: 10px 0;
        }

        a {
            color: #337ab7;
            text-decoration: none;
        }

        a:hover {
            color: #23527c;
        }

        form {
            background-color: #f2f2f2;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Manage Courses</h2>
        <form method="post">
            <label for="course_content">Course Content:</label><br>
            <input type="text" id="course_content" name="Content" required><br><br>
            <label for="course_category">Course Category:</label><br>
            <input type="text" id="course_category" name="Category" required><br><br>
            <button type="submit" name="insert">Insert Course</button><br><br>
        </form><br>

        <form method="post">
            <label for="update_course_code">Course Code to Update:</label><br>
            <input type="text" id="update_course_code" name="course_code" required><br>
            <label for="update_course_content">New Course Content:</label><br>
            <input type="text" id="update_course_content" name="Content" required><br><br>
            <label for="update_course_category">New Course Category:</label><br>
            <input type="text" id="update_course_category" name="Category" required><br><br>
            <button type="submit" name="update">Update Course</button>
        </form><br>

        <form method="post">
            <label for="delete_course_code">Course Code to Delete:</label><br>
            <input type="text" id="delete_course_code" name="course_code" required><br><br>
            <button type="submit" name="delete">Delete Course</button>
        </form>

        <form action="view_suggested_courses.php" method="get">
            <button type="submit">Suggested Courses</button>
        </form>
    </div>
</body>

</html>
