<?php 
  ini_set('display_errors', 'On');
  error_reporting(E_ALL);
  session_start();
    require("../db.php");
    require("../modules/upload2.php");
    // require("../models/upload2.php");

    if(isset($_POST["submit"])){
        $img = uploadFile("image", "image");

        var_dump($img);
    }
?>