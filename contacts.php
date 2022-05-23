<?php 
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    // session_start();
    // include("db.php");

    if($_SESSION["user"]){
        $userID = $_SESSION["user"]["id"];
        $users = [];

        // echo $_SESSION["user"]["username"];
        // echo $userID;

        $sql = "SELECT * FROM `relationships` WHERE `user1_id` = $userID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $contactID = $row["user2_id"];

            $sql2 = "SELECT * FROM `users` WHERE `id` = $contactID";
            
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
            // output data of each row
            while($row2 = $result2->fetch_assoc()) {
                if(count($users) === 0){
                    $users[0] = $row2;
                } else {
                    array_push($users, $row2);
                }
            }
            } else {
                echo "<script>console.log('searching contacts: 0 results')</script>";
            }
        }
        } else {
            echo "<script>console.log('searching contacts: 0 results')</script>";
        }
    }
?>