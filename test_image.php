<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("db.php");
        session_start();
        $username = $_SESSION["user"]["username"];
        $profileimg_id = $_SESSION["user"]["profileimg_id"];
        echo '<h1>Hello!!!</h1>';
        echo "<br>";
        echo $username;
        echo "<br>";
        echo $profileimg_id;

        $sql = "SELECT * FROM `profile_images` WHERE `id`='$profileimg_id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $path = $row["path"];
              echo "<img src=\"./profile_images/$path\">";
            }
          } else {
            echo "0 results";
          }
    ?>
</body>
</html>