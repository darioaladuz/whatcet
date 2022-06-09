<?php 
    include("../db.php");

    // $contact = [
    //     "username" => "Dario"
    // ]; 
        
    if(isset($_POST["contactId"])){
        $contactId = $_POST["contactId"];
        // $sql = "SELECT * FROM `users` WHERE `username` = '$contactUsername'";
        $sql = "SELECT u.fullname, pimg.path
                FROM `users` u
                INNER JOIN `profile_images` pimg
                ON u.profileimg_id = pimg.id 
                WHERE u.id = '$contactId'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $contact = $result->fetch_assoc();
            exit(json_encode($contact));
        }

    }
?>