<section id="search-bar-container">
    <form action="" method="POST">
        <i class="fas fa-search"></i>
        <input type="text" id="search-bar" name="search" placeholder="Search or start new chat">
        <input type="submit" name="submit_search" />
    </form>
</section>

<?php 
    if(isset($_POST["search"])){
        $search = $_POST["search"];
        $user_id = $_SESSION["user"]["id"];

        // $sql = "SELECT * FROM `users` WHERE `username` LIKE '%$search%'";

        $sql = "SELECT u.id, u.fullname, u.profileimg_id, r.conversation_id
                FROM `users` u
                INNER JOIN relationships r
                WHERE (username LIKE '%$search%')
                    AND (r.user1_id = $user_id AND u.id = r.user2_id)";

        $result = $conn->query($sql);
        $filter = array();
        while($row = $result->fetch_assoc()) {
            $conversation_id = $row["conversation_id"];

            $sql2 = "SELECT text, timestamp, user_sender_id FROM `messages` WHERE `conversation_id` = $conversation_id ORDER BY timestamp DESC LIMIT 1";
            
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
            // output data of each row
            while($row2 = $result2->fetch_assoc()) {
                $row["last_message"] = $row2;
                // if(count($users) === 0){
                //     $users[0] = $row;
                // } else {
                //     array_push($users, $row);
                // }
                if($row["id"] !== $_SESSION["user"]["id"]){
                    if(count($filter) === 0){
                        $filter[0] = $row;
                    } else {
                        array_push($filter, $row);
                    }
                }
            }
            } else {
                echo "<script>console.log('searching contacts: 0 results')</script>";
            }
            
        }
    }
?>