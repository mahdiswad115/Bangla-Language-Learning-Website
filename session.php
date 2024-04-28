<?php
include ('dbconnect.php');
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if ($_SESSION['type'] == 'user'){
    $user_sql = "SELECT * FROM Users WHERE Email='$email' AND Password='$password'";
    $user_result = $conn->query($user_sql);
    $row = $user_result->fetch_assoc();
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['name'] = $row['Name'];
    $_SESSION['password'] = $row['Password'];
    $_SESSION['email'] = $row['Email'];
    $_SESSION['address'] = $row['Address'];
    $_SESSION['Membership_status'] = $row['Membership_status'];
    $_SESSION['phone_number'] = $row['Phone_Number'];

} elseif ($_SESSION['type'] == 'instructor'){
    $instructor_sql = "SELECT * FROM Instructor WHERE Email='$email' AND Password='$password'";
    $instructor_result = $conn->query($instructor_sql);
    $row = $instructor_result->fetch_assoc();
    $_SESSION['instructor_id'] = $row['instructor_id'];
    $_SESSION['name'] = $row['Name'];
    $_SESSION['email'] = $row['Email'];
    $_SESSION['password'] = $row['Password'];
    $_SESSION['phone_number'] = $row['Phone_Number'];
    $_SESSION['Educational_Qualification'] = $row['Educational_Qualification'];
    $_SESSION['joining_date'] = $row['joining_date'];
    $_SESSION['payment_eligibility'] = $row['payment_eligibility'];

} elseif ($_SESSION['type'] == 'admin'){
    $adminn_sql = "SELECT * FROM adminn WHERE Email='$email' AND Password='$password'";
    $adminn_result = $conn->query($adminn_sql);
    $row = $adminn_result->fetch_assoc();
    $_SESSION['admin_id'] = $row['admin_id'];
    $_SESSION['name'] = $row['Name'];
    $_SESSION['email'] = $row['Email'];
}
?>