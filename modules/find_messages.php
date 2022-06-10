<?php 
    include("../db.php");
    session_start();
    
    $id = $_SESSION["user"]["id"];

    // $contact = [
    //     "username" => "Dario"
    // ]; 
        
    if(isset($_POST["contactId"])){
        $contactId = $_POST["contactId"];
        // $sql = "SELECT * FROM `users` WHERE `username` = '$contactUsername'";
        $sql = "SELECT r.conversation_id, m.text, m.user_sender_id, m.user_receiver_id, m.timestamp
                FROM `relationships` r
                INNER JOIN `messages` m
                ON r.conversation_id = m.conversation_id 
                WHERE r.user1_id = $id AND r.user2_id = $contactId
                ORDER BY m.timestamp DESC";

        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $messages = array();
            while($message = $result->fetch_assoc()){
                if(count($messages) === 0){
                    $messages[0] = $message;
                } else {
                    array_push($messages, $message);
                }
            }
            exit(json_encode($messages));
        } else {
            $messages = array();
            exit(json_encode($messages));
        }

    }
?>