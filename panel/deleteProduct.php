<?php
    require '../db.php';
    session_start();

    $productId = mysqli_real_escape_string($conn, $_POST['removeID']);

    $query = mysqli_query($conn, "SELECT * FROM products WHERE id='$productId'");
    $row = mysqli_fetch_row($query);
    
    $fileName = $row[4];

    chdir("../img/static/");
    unlink($fileName);

    $sql = "DELETE FROM products WHERE id='$productId'";
    mysqli_query($conn, $sql);

    $tagSQL = "DELETE FROM productTags WHERE productID='$productId'";
    mysqli_query($conn, $tagSQL);

    header("location: ./panel.php");
?>