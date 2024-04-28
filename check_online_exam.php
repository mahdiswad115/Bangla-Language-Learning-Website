<?php
session_start();
include('dbconnect.php');
include('session.php');
$success_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['exam_code']) && isset($_POST['category']) && isset($_POST['type'])) {
        $exam_code = $_POST['exam_code'];
        $category = $_POST['category'];
        $type = $_POST['type'];
        $sql = "INSERT INTO online_exam (instructor_id, exam_code, category, type) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiss", $_SESSION['instructor_id'], $exam_code, $category, $type);
        if ($stmt->execute()) {
            $success_message = "Exam added to database successfully!";
        } else {
            $error_message = "Error adding exam to database: " . $conn->error;
        }
        $stmt->close();
    }
}

$sql = "SELECT * FROM exam WHERE Type='Online'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Online Exam</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
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
        }
        li {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .add-button {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .add-button:hover {
            background-color: #0056b3;
        }
        .message {
            color: #008000;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Online Exams</h2>
        <?php if (!empty($success_message)) : ?>
            <p class="message"><?php echo $success_message; ?></p>
        <?php endif; ?>
        <?php if ($result->num_rows > 0) : ?>
            <ul class="column-headers">
                <li>
                    <span>Category - Date - Time</span>
                    <span>Action</span>
                </li>
            </ul>
            <ul>
                <?php while($row = $result->fetch_assoc()) : ?>
                    <li>
                        <span><?php echo $row["Category"] . " - " . $row["Date"] . " - " . $row["Time"]; ?></span>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <input type="hidden" name="exam_code" value="<?php echo $row['Exam_code']; ?>">
                            <input type="hidden" name="category" value="<?php echo $row['Category']; ?>">
                            <input type="hidden" name="type" value="<?php echo $row['Type']; ?>">
                            <button type="submit" class="add-button">Add</button>
                        </form>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else : ?>
            <p>No online exams found.</p>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>
