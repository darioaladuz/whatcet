<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "whatcet";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error){
        echo "<script>console.log('Connection error')</script>";
        die("Connection failed: " . $conn->connection_error);
    } else {
        // echo "<script>console.log('Connected successfuly')</script>";
    }
?>
