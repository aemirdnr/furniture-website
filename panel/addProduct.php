<?php
    require '../db.php';
    session_start();

    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);
    $productLink = mysqli_real_escape_string($conn, $_POST['productLink']);

    if (empty($productName) || empty($productPrice) || empty($productLink)) {
        echo "There is empty inputs or no picture.";
        die;
    }
    else {
        $image = $_FILES["productPicture"]["name"];
        $dir = "../img/static/";

        $target_file = microtime() . basename($_FILES["productPicture"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $uploadOk = 1;

        //Only JPG, JPEG and PNG allowed.
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            echo "Sorry, only JPG, JPEG, PNG files are allowed.";
            $uploadOk = 0;
        }

        //If file size larger than 50MB
        if ($_FILES["productPicture"]["size"] > 30000000) {
            echo "Sorry, files need to be less than 30MB.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "<br>";
            echo "Upload is failed, please try again.";
            die;
        } 
        else { //Everything is fine to upload
            if (move_uploaded_file($_FILES["productPicture"]["tmp_name"], $dir . $target_file)) {

                $imageName = microtime() . ".webp";

                if($imageFileType == "jpg" || $imageFileType == "jpeg") {
                    $imgobject = imagecreatefromjpeg($dir.$target_file);
                }
                else if ($imageFileType == "png") {
                    $imgobject = imagecreatefrompng($dir.$target_file);
                    imagepalettetotruecolor($imgobject);
                }

                imagewebp($imgobject, $dir . $imageName);
                imagedestroy($imgobject);

                //delete initial uploaded png image
                unlink($dir.$target_file);

                header("location: ./panel.php");
            } else {
                echo "Failed to upload, please try again.";
            }
        }

        $sql = "INSERT INTO products (name, price, link, image) VALUES ('$productName', '$productPrice', '$productLink', '$imageName')";
        mysqli_query($conn, $sql);

        header("location: ./panel.php");
    }
?>