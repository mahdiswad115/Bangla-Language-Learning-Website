<?php
session_start();
include('dbconnect.php');
include('session.php');

$membership_status = $_SESSION['Membership_status'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('https://images3.alphacoders.com/267/267485.jpg');
            background-size: cover;
            background-repeat: no-repeat;
        }
        .container {
            display: flex;
            justify-content: space-between;
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .details, .actions {
            width: 45%;
        }
        h2, h3 {
            color: #007bff;
            margin-bottom: 20px;
        }
        p {
            margin-bottom: 10px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s;
        }
        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="details">
            <h2>Welcome, <?php echo $_SESSION['name']; ?>!</h2>
            <h3>Your Details:</h3>
            <p><strong>Name:</strong> <?php echo $_SESSION['name']; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION['email']; ?></p>
            <p><strong>Address:</strong> <?php echo $_SESSION['address']; ?></p>
            <p><strong>Membership Status:</strong> <?php echo $membership_status; ?></p>
            <p><strong>Phone Number:</strong> <?php echo $_SESSION['phone_number']; ?></p>
        </div>
        <div class="actions">
            <h3>Actions:</h3>
            <ul>
                <?php if ($membership_status == 'Active') : ?>
                    <li><a href="enroll_course.php">Enroll in a Course</a></li>
                    <li><a href="take_exam.php">Take an Exam</a></li>
                    <li><a href="user_feedback_form.php">Give Feedback</a></li>
                    <li><a href="show_user_courses.php">Show My Courses</a></li>
                <?php else : ?>
                    <li>Membership status is inactive. Please <a href="make_payment.php">make a payment</a> first.</li>
                <?php endif; ?>
                <li><a href="make_payment.php">Make a Payment</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
