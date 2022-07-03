<?php
    require '../db.php';
    session_start();

    //ProductID -> tags table
    $productTagID = mysqli_real_escape_string($conn, $_POST['productTagID']);

    //TagName the choose to delete
    $productTagName = mysqli_real_escape_string($conn, $_POST['productTagName']);

    $sql = "DELETE FROM productTags WHERE productID='$productTagID' AND tag='$productTagName'";
    mysqli_query($conn, $sql);

    header("location: ./panel.php");
?>