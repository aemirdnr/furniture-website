<?php
require 'db.php';
session_start();

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");
$row = mysqli_fetch_object($query);

if ($row->password == $password) {
    if (!empty($row->password)) {
        $_SESSION['admin'] = "true";
    
        header("location: ./panel/panel.php");
    }
    else{
        header("location: ./panel/panel.php");
    }
} else {
    echo "Username or password is wrong, please try again.";
}
?>