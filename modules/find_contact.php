<?php 
    include("../db.php");

    $contact = [
        "username" => "Dario"
    ];

    
        
    if(isset($_POST["contactUsername"])){
        $contactUsername = $_POST["contactUsername"];
        // $sql = "SELECT * FROM `users` WHERE `username` = '$contactUsername'";
        $sql = "SELECT * FROM `users` 
                INNER JOIN `profile_images` 
                ON users.profileimg_id = profile_images.id 
                WHERE `username` = '$contactUsername'";
        $result = $conn->query($sql);

        if($result->num_rows > 0){
            $contact = $result->fetch_assoc();
            exit(json_encode($contact));
        }

    }
?>