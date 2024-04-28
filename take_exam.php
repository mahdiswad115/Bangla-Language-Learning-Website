<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Selection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            width: 100%;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        h3 {
            text-align: center;
            margin-bottom: 10px;
        }
        ul {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        li {
            width: calc(33.33% - 10px);
            margin-bottom: 20px;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }
        form {
            display: inline;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        p {
            text-align: center;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Exam Selection</h2>
        <h3>Available Exams:</h3>
        <?php include 'get_exams.php'; ?>
        <?php if (!empty($exams)) : ?>
            <ul>
                <?php foreach ($exams as $exam) : ?>
                    <li>
                        <strong>Exam Code:</strong> <?php echo $exam['Exam_code']; ?><br>
                        <strong>Date:</strong> <?php echo $exam['Date']; ?><br>
                        <strong>Time:</strong> <?php echo $exam['Time']; ?><br>
                        <strong>Category:</strong> <?php echo $exam['Category']; ?><br>
                        <strong>Type:</strong> <?php echo $exam['Type']; ?><br>
                        <form action="exam_content.php" method="GET">
                            <input type="hidden" name="exam_code" value="<?php echo $exam['Exam_code']; ?>">
                            <input type="submit" value="Take Exam">
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>No exams available at the moment.</p>
        <?php endif; ?>
    </div>
</body>
</html>
