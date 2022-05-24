<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        $sql = "SELECT * FROM `users` WHERE `id` = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo $row["fullname"];
        }
        } else {
            echo "<script>console.log('searching contacts: 0 results')</script>";
        }
        $conn->close();
    ?>
</body>
</html>