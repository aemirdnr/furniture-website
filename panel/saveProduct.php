<?php
    require '../db.php';
    session_start();

    $productName = mysqli_real_escape_string($conn, $_POST['productName']);
    $productPrice = mysqli_real_escape_string($conn, $_POST['productPrice']);
    $productLink = mysqli_real_escape_string($conn, $_POST['productLink']);
    $productId = mysqli_real_escape_string($conn, $_POST['productID']);

    if (empty($productName) || empty($productPrice) || empty($productLink)) {
        echo "There is empty inputs, please try again.";
        die;
    } else {
        if ($_FILES['productPicture']['name'] != "") {
            
            $sql = mysqli_query($conn, "SELECT * FROM products WHERE id='$productId'");
            $row = mysqli_fetch_row($sql);
        
            $fileName = $row[4];

            //Upload new picture
            $dir = "../img/static/";
            $target_file = "" . microtime() . basename($_FILES["productPicture"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["productPicture"]["tmp_name"], "../img/static/" . $target_file);

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

            //Delete used picture
            chdir("../img/static/");
            
            unlink($fileName);

            //Update the data
            $query = "UPDATE products SET name='$productName', price='$productPrice', link='$productLink', image='$imageName' WHERE id='$productId'";
            mysqli_query($conn, $query);
        } else {
            //Update the data
            $query = "UPDATE products SET name='$productName', price='$productPrice', link='$productLink' WHERE id='$productId'";
            mysqli_query($conn, $query);
        }

        header("location: ./panel.php");
    }
    
?>