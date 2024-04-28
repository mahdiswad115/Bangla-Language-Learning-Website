<?php
session_start();
include ('dbconnect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION["email"] = $email;
    $_SESSION["password"] = $password;
    $user_sql = "SELECT * FROM Users WHERE Email='$email' AND Password='$password'";
    $user_result = $conn->query($user_sql);
    $instructor_sql = "SELECT * FROM Instructor WHERE Email='$email' AND Password='$password'";
    $instructor_result = $conn->query($instructor_sql);
    $adminn_sql = "SELECT * FROM adminn WHERE Email='$email' AND Password='$password'";
    $adminn_result = $conn->query($adminn_sql);

    if ($user_result->num_rows !=0) {
        $_SESSION['email'] = $email;
        $_SESSION['type'] = 'user';
        header("Location: user_dashboard.php");
        exit();
    } elseif ($instructor_result->num_rows !=0) {
        $_SESSION['email'] = $email;
        $_SESSION['type'] = 'instructor';
        header("Location: instructor_dashboard.php");
        exit();
    } elseif ($adminn_result->num_rows !=0) {
        $_SESSION['email'] = $email;
        $_SESSION['type'] = 'admin';
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $_SESSION['login_error'] = "Invalid email or password";
        header("Location: login.php");
        exit();
    }
}

$conn->close();
?>
