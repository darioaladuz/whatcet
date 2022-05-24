<?php 
    include("../db.php");

    if(isset($_POST["type"]) && $_POST["type"] === "register"){
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $hash = convert_uuencode($_POST["password"]);
        // $id = random_int(1, 1000000);

        $findUsername = "SELECT * FROM users WHERE username='$username'";
        $usernameExists = ($conn->query($findUsername))->num_rows > 0;
        // $result = $conn->query($sql);

        // echo $sql;
        // echo $result;

        $findEmail = "SELECT * FROM users WHERE email='$email'";
        $emailExists = ($conn->query($findEmail))->num_rows > 0;
        // $emailExists = $conn->$query($userExists);

        // echo $userExists;
        // echo $emailExists;
        if($usernameExists || $emailExists){
            // $conn->close();
            header("Location: index.php?alreadyexists=true&fullname=$fullname&username=$username&email=$email", TRUE, 301);
        }

        // if($usernameExists){
        //     $conn->close();
        //     header("Location: index.php?usernameexists=true&fullname=$fullname&username=$username&email=$email", TRUE, 301);
        // }

        // if($emailExists){
        //     $conn->close();
        //     header("Location: index.php?emailexists=true&fullname=$fullname&username=$username&email=$email", TRUE, 301);
        // }
        
        if($_POST["password"] === $_POST["password2"]){
            $sql = "INSERT INTO users (fullname, username, email, hash, status, profileimg_id) 
                    VALUES ('$fullname', '$username', '$email', '$hash', 'Hey there! I am using WhatCet.', 0)";

            if($conn->query($sql)){
                echo "<script>console.log('New record created successfully')</script>";
            } else {
                echo "<script>console.log(Error: " . $sql . "<br>" . $conn->error . ")</script>";
            }
        } else {
            echo "<script>alert('Passwords must match!')</script>";
        }

        $conn->close();
    } else {
        echo "404 Not Found";
    }
    header("Location: ../index.php", TRUE, 301);
?>