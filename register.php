<?php
session_start();
require_once('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['registerUsername'];
    $password = $_POST['registerPassword'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) === 0) {
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        mysqli_query($connection, $query);
        header('Location: index.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
?>