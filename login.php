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

            $profileimg_id = $_SESSION['user']['profileimg_id'];

            $sql = "SELECT * FROM `profile_images` WHERE `id`='$profileimg_id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $path = $row["path"];
                    $_SESSION['user']['profileimg_path'] = "/profile_images/$path";
                }
            } else {
                echo "0 results";
            }
            echo $username;
        } else {
            echo "Password incorrect";
        }
    } else {
        echo "Gdoobye";
    }
    header("Location: index.php?wrongcredentials=true", TRUE, 301);
?>