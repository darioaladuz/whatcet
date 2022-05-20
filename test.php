<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Tests</h1>

    <h2>Relationships</h2>

    <?php 
        session_start();
        include("db.php");

        $userID = $_SESSION["user"]["id"];

        echo $_SESSION["user"]["username"];
        echo $userID;

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
                echo "<div><p>" . $row2["fullname"] . "</p></div>";
            }
            } else {
            echo "0 results";
            }
        }
        } else {
        echo "0 results";
        }
        $conn->close();
    ?>
</body>
</html>