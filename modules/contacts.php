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

        $sql = "SELECT u.id, u.fullname, u.profileimg_id, r.conversation_id
                FROM `users` u
                INNER JOIN relationships r
                WHERE (r.user1_id = $userID AND u.id = r.user2_id)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $conversation_id = $row["conversation_id"];

            $sql2 = "SELECT text, timestamp FROM `messages` WHERE `conversation_id` = $conversation_id ORDER BY timestamp DESC LIMIT 1";
            
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
            // output data of each row
            while($row2 = $result2->fetch_assoc()) {
                $row["last_message"] = $row2;
                if(count($users) === 0){
                    $users[0] = $row;
                } else {
                    array_push($users, $row);
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

    // SELECT *
    // FROM users u
    // INNER JOIN relationships r
    //     on (r.user1_id = u.id AND r.user2_id = 749501)
    // INNER JOIN messages m
    //     on r.conversation_id = m.conversation_id
    // WHERE u.id = 749500
    // ORDER BY m.timestamp DESC
    // LIMIT 1
?>