<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    session_start();
    include("../db.php");

    $user = $_SESSION["user"];
    $id = $user["id"];
    $id2 = $_POST["contactId"];

    // $sql = "SELECT r.conversation_id, m.text, m.user_sender_id, m.user_receiver_id, m.timestamp
    //         FROM `relationships` r
    //         INNER JOIN `messages` m
    //             on r.conversation_id = m.conversation_id
    //         WHERE r.user1_id = $id AND r.user2_id = $id2";

    // $result = $conn->query($sql);
    
    // if ($result->num_rows > 0) {
    // // // output data of each row
    // echo "<div class=\"messages\">";
    // while($row = $result->fetch_assoc()) {
    //     $messageClass = intval($row["user_sender_id"]) === 749500 ? "sender" : "receiver"; 
    //     $timestamp = $row["timestamp"];
    //     $timestamp = strtotime($timestamp);    
    //     $timestamp = date("H:i", $timestamp); 
    //     echo "<p class=\"message $messageClass\">";
    //     echo $row["text"] . ' ' . $timestamp;
    //     echo "</p>";
    // }
    // echo "</div>";
    // } else {
    //     echo "0 results";
    // }
    if(isset($_POST["message"])){
        $sql = "SELECT * FROM `relationships`
            WHERE `user1_id` = $id
            AND `user2_id` = $id2";

        $text = $_POST["message"];

        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $message = $_POST["message"];
            // echo $message;
            $result = mysqli_fetch_assoc($result);
            $conversation_id = $result["conversation_id"];

            $sql = "INSERT INTO `messages` (user_sender_id, user_receiver_id, text, conversation_id) VALUES ($id, $id2, '$message', $conversation_id)";

            if ($conn->query($sql) === TRUE) {
                // echo "New record created successfully";
                $message_id = $conn->insert_id;
                $sql = "SELECT * FROM messages WHERE id = $message_id";

                $sentMessage = $conn->query($sql);

                if($sentMessage->num_rows > 0) {
                    $sentMessage = $sentMessage->fetch_assoc();
                    exit(json_encode($sentMessage));
                } else {

                }
                $conn->close();
                header("Location: ../index.php", TRUE, 301);
                } else {
                // echo "Error: " . $sql . "<br>" . $conn->error;
                }
            // echo "<div class=\"messages\">";
        } else {
            // create conversation
            $sql = "INSERT INTO `conversations` (id) VALUES (NULL)";
            if ($conn->query($sql) === TRUE) {
                // create relationship
                $conversation_id = $conn->insert_id;
                $sql = "INSERT INTO `relationships` (user1_id, user2_id, blocked, conversation_id) VALUES ($id, $id2, 0, $conversation_id), ($id2, $id, 0, $conversation_id)";
                if($conn->query($sql) === TRUE) {
                    // create message
                    $sql = "INSERT INTO `messages` (user_sender_id, user_receiver_id, text, conversation_id) VALUES ($id, $id2, '$text', $conversation_id)";

                    if($conn->query($sql) === TRUE) {
                        // echo "New relationship created and message sent";

                        $message_id = $conn->insert_id;
                        $sql = "SELECT * FROM messages WHERE id = $message_id";

                        $sentMessage = $conn->query($sql);

                        if($sentMessage->num_rows > 0) {
                            $sentMessage = $sentMessage->fetch_assoc();
                            exit(json_encode($sentMessage));
                        } else {

                        }
                        $conn->close();
                        header("Location: ../index.php", TRUE, 301);
                    } else {
                        // echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    // echo "Error: " . $sql . "<br>" . $conn->error;
                }
                } else {
                // echo "Error: " . $sql . "<br>" . $conn->error;
                }
            // is it too much? find ways to make it more efficient

            // echo "Relationship doesn't exist.";
        }
    }
?>