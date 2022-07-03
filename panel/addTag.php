<?php
    require '../db.php';
    session_start();

    $tagName = mysqli_real_escape_string($conn, $_POST['tagName']);

    $sql = "INSERT INTO tags (tag) VALUES ('$tagName')";
    mysqli_query($conn, $sql);

    header("location: ./panel.php");
?>