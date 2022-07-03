<?php
    require '../db.php';
    session_start();

    //Product ID
    $urunID = mysqli_real_escape_string($conn, $_POST['urunID']);

    //Tag
    $tagName = mysqli_real_escape_string($conn, $_POST['tagName']);

    $query = mysqli_query($conn, "SELECT * FROM productTags WHERE productID='$urunID' AND tag='$tagName'");
    $tagRow = mysqli_fetch_row($query);
    if ($tagRow == null) {
        $sql = "INSERT INTO productTags (productID, tag) VALUES ('$urunID', '$tagName')";
        mysqli_query($conn, $sql);
    }

    header("location: ./panel.php");
?>