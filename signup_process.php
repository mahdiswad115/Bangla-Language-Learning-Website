<?php
include ('dbconnect.php');
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$password = $_POST['password'];
$phone_number = $_POST['phone_number'];
$membership_status = "Inactive"; 

$sql = "INSERT INTO Users (Name, Address, Email, Password, Membership_status, Phone_Number)
        VALUES ('$name', '$address', '$email', '$password', '$membership_status', '$phone_number')";

if ($conn->query($sql) === TRUE) {
    header("Location: login.php");
    exit();
} else {
    $error_message = "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
