<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .messages {
            min-width: 350px;
            max-width: 500px;
            border: 1px solid rgba(0,0,0,.15);
            padding: 8px 16px;
            display: flex;
            flex-direction: column;
            margin: 0 auto;
        }

        .message {
            border: 3px solid rgba(0,0,0,.25);
            padding: 12px 24px;
            border-radius: 12px;
        }

        .sender {
            background-color: rgba(255, 0, 255, .15);
            align-self: flex-end;
        }

        .receiver {
            background-color: rgba(255, 255, 0, .15);
            align-self: flex-start;
        }

        form {
            margin: 0 auto;
            padding: 32px;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        input, button {
            padding: 8px 16px;
        }
    </style>
</head>
<body>
    <h1>INNER JOIN</h1>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        session_start();
        include("db.php");
        $user = $_SESSION["user"];
        $id = $user["id"];
        $id2 = 749501;
        
        $sql = "SELECT * FROM `relationships`
                WHERE `user1_id` = $id
                AND `user2_id` = $id2";

        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p>";
            echo "Ok, we found a relationship";
            echo "</p>";

            $sql2 = "SELECT u.username
                        , c.id
                        , m.text
                        , m.user_sender_id
                    FROM users u
                    INNER JOIN conversation_relationships cr
                        on u.id = cr.user_id
                    INNER JOIN conversations c
                        on cr.conversation_id = c.id
                    INNER JOIN messages m
                        on c.id = m.conversation_id
                    WHERE u.username = 'dario'
                    AND (u.id = m.user_sender_id OR u.id = m.user_receiver_id)";
            
            $result2 = $conn->query($sql2);
            
            if($result2->num_rows > 0) {
                echo "<div class=\"messages\">";
                while($row2 = $result2->fetch_assoc()){
                    $class = $row2["user_sender_id"] === $id ? "sender" : "receiver";
                    echo "<p class=\"message $class\">";
                    echo $row2["text"];
                    echo "</p>";
                }
                echo "</div>";
            } else {
                echo "There are no messages";
            }
        }
        } else {
            echo "0 results";
        }
    ?>

    <form action="" method=GET">
        <input type="text" id="message" name="message" placeholder="Send a message" required />
        <button type="submit">SEND</button>
    </form>

    <?php 
        if(isset($_GET["message"])){
            $sql = "SELECT * FROM `relationships`
                WHERE `user1_id` = $id
                AND `user2_id` = $id2";

            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                // use deep inner join code in order to find conversation id
                $message = $_GET["message"];

                $sql = "INSERT INTO `messages` (user_sender_id, user_receiver_id, text, conversation_id) VALUES ($id, $id2, '$message', 1)";

                if ($conn->query($sql) === TRUE) {
                    echo "New record created successfully";
                    header("Location: test.php", TRUE, 301);
                  } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                  }
            } else {
                // create relationship
                // create conversation
                // create conversation relationship
                // create message
                // is it too much? find ways to make it more efficient
            }
        }
    ?>
</body>
</html>