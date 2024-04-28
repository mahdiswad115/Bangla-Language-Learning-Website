<?php
session_start();
include('dbconnect.php');
include('session.php');
$sql = "SELECT * FROM Instructor WHERE instructor_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $_SESSION['instructor_id']);
$stmt->execute();
$result = $stmt->get_result();
$joining_date = "N/A";
$payment_eligibility = "N/A";
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $joining_date = $row['joining_date'];
    $payment_eligibility = ($row['payment_eligibility'] == 1) ? 'Eligible' : 'Not Eligible';
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            background-image: url('https://wallpapers.com/images/hd/top-view-study-aesthetic-desk-xqhwe4ieuwsipmtc.jpg'); 
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        div.container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
            max-width: 400px;
        }

        h2, h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        p {
            margin-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li a {
            display: block;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin-bottom: 10px;
            border-radius: 5px;
            text-decoration: none;
            text-align: center;
        }

        ul li a:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
        <h3>Your Details:</h3>
        <p><strong>Name:</strong> <?php echo $_SESSION['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
        <p><strong>Phone Number:</strong> <?php echo $_SESSION['phone_number']; ?></p>
        <p><strong>Educational Qualification:</strong> <?php echo $_SESSION['Educational_Qualification']; ?></p>
        <p><strong>Joining Date:</strong> <?php echo $joining_date; ?></p>
        <p><strong>Payment Eligibility:</strong> <?php echo $payment_eligibility; ?></p>
        <h3>Actions:</h3>
        <ul>
            <li><a href="course_suggestion.php">Suggest a Course</a></li>
            <li><a href="monitor_live_exam.php">Monitor Live Exam</a></li>
            <li><a href="check_online_exam.php">Check Online Exam</a></li>
            <li><a href="instructor_feedback.php">Give Feedback</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</body>
</html>
