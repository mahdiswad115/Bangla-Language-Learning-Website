<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'banglalanguage';

    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn){
        echo 'Connection Unsuccessfull'; 
    }
?>