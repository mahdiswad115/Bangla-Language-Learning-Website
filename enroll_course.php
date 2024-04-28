<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll in a Course</title>
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
        h2 {
            color: #333;
            text-align: center; 
            margin-bottom: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        li {
            width: calc(33.33% - 10px); 
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        form {
            display: inline-block;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        p {
            margin: 10px 0;
            color: #ff0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Enroll in a Course</h2>
        <?php include 'get_courses.php'; ?>
        <?php if (!empty($courses)) : ?>
            <ul>
                <?php foreach ($courses as $course) : ?>
                    <li>
                        <strong>Course Code:</strong> <?php echo $course['Course_code']; ?><br>
                        <strong>Content:</strong> <?php echo $course['Content']; ?><br>
                        <strong>Category:</strong> <?php echo $course['Category']; ?><br>
                        <?php if ($_SESSION['Membership_status'] == 'Active') : ?>
                            <form action="enroll.php" method="POST">
                                <input type="hidden" name="course_code" value="<?php echo $course['Course_code']; ?>">
                                <input type="submit" value="Enroll">
                            </form>
                        <?php else : ?>
                            <p>Make Payment First</p>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No courses available at the moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>
