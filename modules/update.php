<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATING</title>
</head>
<body>
<?php 
    session_start();
    include("../db.php");

    $username = $_SESSION["user"]["username"];
    $fullname = $_POST["fullname"];
    $status = $_POST["status"];

    if(isset($_POST["fullname"])){
        $sql = "UPDATE `users` 
            SET `fullname` = '$fullname' 
            WHERE `username`='$username'";
    }

    // for some fucking reason this worked once then just keeps giving me error

    if(isset($_POST["status"])){
        $sql = "UPDATE `users` 
            SET `status` = '$status' 
            WHERE `username`='$username'";
    }

    if($conn->query($sql)){
        echo "<script>console.log('Updated successfully')</script>";
        
        if(isset($_POST["fullname"])){
            $_SESSION["user"]["fullname"] = $fullname;
        }

        if(isset($_POST["status"])){
            $_SESSION["user"]["status"] = $status;
        }
    } else {
        echo "<script>console.log(Error: " . $sql . "<br>" . $conn->error . ")</script>";
    }

    $conn->close();
    header("Location: ../index.php", TRUE, 301);
?>
</body>
</html>