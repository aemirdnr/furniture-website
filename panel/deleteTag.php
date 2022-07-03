<?php
    require '../db.php';
    session_start();

    $tagID = mysqli_real_escape_string($conn, $_POST['tagId']);

    $query = "DELETE FROM tags WHERE id='$tagID'";
    mysqli_query($conn, $query);

    header("location: ./panel.php");
?>