<?php
session_start(); 
include('dbconnect.php');
header("Location: index.php?warn=You've Been Logged Out");
exit();
?>