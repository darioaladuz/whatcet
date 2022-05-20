<?php 
    session_start();
    include("./db.php");

    echo "working<br>";

    if(isset($_POST["type"]) && $_POST["type"] === "login"){
        $username = $_POST["username"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $conn->query($sql);
        $result = $result->fetch_assoc();

        if($password === convert_uudecode($result["hash"])){
            $_SESSION['user'] = $result;

            echo $username;
        } else {
            echo "Password incorrect";
        }
    } else {
        echo "Gdoobye";
    }
    header("Location: index.php", TRUE, 301);
?>