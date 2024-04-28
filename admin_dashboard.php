<?php
session_start();
include('dbconnect.php');
include('session.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="admin_style.css">
</head>
<body>
<style>
body {
    background-image: url('https://getwallpapers.com/wallpaper/full/0/0/b/1215923-high-resolution-landscape-computer-wallpaper-1920x1080-xiaomi.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: #fff;
}  

#header {
    text-align: center;
    color: #F2674A;
    font-size: 40px; /* Increase the font size */
}

.admin-info {
    color: #000000;
    background-color: rgba(255, 255, 255, 0.5);
    padding: 10px;
}

.dashboard-section {
    color: #000000;
    background-color: rgba(255, 255, 255, 0.5);
    padding: 20px;
}

.dashboard-section h3 {
    font-weight: bold;
    font-size: 24px; /* Increase the font size */
}

.col-md-2, .col-md-10 {
    padding: 10px;
}

.item-box {
    background-color: #ffffff;
    color: #000000;
    border: 1px solid #ccc;
    padding: 10px;
    margin-bottom: 10px;
}

.btn-primary {
    background-color: #F2674A; /* Change the button color */
    border: none;
    color: white;
    padding: 15px 32px; /* Increase the button size */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>
<body>

<section id="header">
    <div class="row">  
        <div class="col-md-2">Bangla Language Learning</div>
        <div class="col-md-10" style="text-align: right;"> 
            <a href="index.php"> Log out </a>
            
        </div>
    </div>
</section>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-3 admin-info">
            <h5>Admin Name: <?php echo $_SESSION['name']; ?></h5>
            <p>Email: <?php echo $_SESSION['email'] ; ?></p>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 dashboard-section">
            <h3>Monitor user payment</h3>
            <div class="col-md-4">
                <a href="user_payment.php" class="btn btn-primary">click here</a>
            </div>	
        </div>
        <div class="col-md-6 dashboard-section">
            <h3>Monitor instructor payment</h3>
            <div class="col-md-4">
                <a href="instructor_payment.php" class="btn btn-primary">click here</a>
            </div>
        </div>
        <div class="col-md-6 dashboard-section">
            <h3>Monitor exam</h3>
            <div class="col-md-4">
                <a href="monitor_exam.php" class="btn btn-primary">click here</a>
            </div>
        </div>
        <div class="col-md-6 dashboard-section">
            <h3>Course</h3>
            <div class="col-md-4">
                <a href="course.php" class="btn btn-primary">click here</a>
            </div>
        </div>
        <div class="col-md-6 dashboard-section">
            <h3>Feedback</h3>
            <div class="col-md-4">
                <a href="feedback.php" class="btn btn-primary">click here</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>
