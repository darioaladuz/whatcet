<?php 
ini_set('display_errors', 'On');
error_reporting(E_ALL);
    // $dir = 'uploads';

    // // create new directory with 744 permissions if it does not exist yet
    // // owner will be the user/group the PHP script is run under
    // if ( !file_exists($dir) ) {
    //     mkdir ($dir, 0744);
    // }

    // file_put_contents ($dir.'/test.txt', 'Hello File');
    // // echo php_ini_loaded_file();
    
    if(isset($_POST["submit"])){
        // seleccionar el archivo enviado desde el input type file
        $file = $_FILES["file"];
        // var_dump($file);
        // variables del archivo 
        basename($fileName = $_FILES["file"]["name"]);
        $fileTmpName = $_FILES["file"]["tmp_name"];
        $fileSize = $_FILES["file"]["size"];
        $fileError = $_FILES["file"]["error"];
        $fileType = $_FILES["file"]["type"];

        // extensión del archivo (explode para separarlo por ., strotlower para forzar minúsculas, end() para sacar el último valor que ya sería la extensión en sí)
        $fileExt = explode(".", $fileName);
        $fileActualExt = strtolower(end($fileExt));

        // extensiones que permitimos (se pueden añadir más o borrar las que no queramos permitir)
        $allowed = array("jpg", "jpeg", "png", "pdf");

        // si la extensión está permitida...
        if(in_array($fileActualExt, $allowed)){
            // si no ha habido errores...
            if($fileError === 0){
                // si el tamaño del archivo es menor a 1M kB...
                if($fileSize < 1000000){
                    // crea un nuevo nombre para el archivo, equivalente a un id único + la extensión

                    $newFileName = uniqid("", true) . "." . $fileActualExt;
                    // destino del archivo (la carpeta /uploads/ + el archivo en sí)
                    $fileDestination = "profile_images/" . $newFileName;
                    // si se ha subido correctamente, redireccionar a index.php
                    if(move_uploaded_file($fileTmpName, $fileDestination)){
                        // header("Location: index.php?image=$fileDestination", TRUE, 301);
                        
                        include("../db.php");

                        $sql = "INSERT INTO `profile_images` (path)
                                VALUES ('$newFileName')";
                        echo $sql;

                        if($conn->query($sql) === TRUE) {
                            // $last_id = $conn->insert_id;
                            session_start();
                            $last_id = $conn->insert_id;
                            echo "New record created successfully, id is : $last_id";
                            $username = $_SESSION["user"]["username"];
                            $sql2 = "UPDATE `users` SET `profileimg_id`='$last_id' WHERE `username`='$username'";

                            if($conn->query($sql2) === TRUE){
                                echo "Image added successfully!!!!";
                            } else {
                                echo "Error";
                            }
                        } else {
                            echo "Error: $sql <br> $conn->error";
                        }
                        $conn->close();
                    // si no se ha subido correctamente:
                    } else {
                        echo $fileTmpName;
                        echo "<br>";
                        echo $fileDestination;
                    }
                // en caso de que el archivo sea mayor a 1M kB
                } else {
                    echo "Your file is too big";
                }
            // en caso de que haya cualquier tipo de error
            } else {
                echo "There was an error";
            }
        // en caso de que el tipo de extensión no sea permitido
        } else {
            echo "You cannot upload files of this type!";
        }
    }
    header("Location: ../index.php", TRUE, 301);
?>