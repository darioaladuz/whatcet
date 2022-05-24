<?php 
    function getProfileImgPath($conn, $id){
        $sql = "SELECT * FROM `profile_images` WHERE `id`='$id'";
        $result = $conn->query($sql);
        $profileimg_path;
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $path = $row["path"];
                $profileimg_path = "/profile_images/$path";
                echo "<script>console.log('$profileimg_path $id')</script>";
            }
            return $profileimg_path;
        } else {
            echo "<script>console.log('user has no profile img $id')</script>";
            $profileimg_path = "/images/default_profile_img.png";
            return $profileimg_path;
        }
    }
?>