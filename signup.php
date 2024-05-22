<?php 
session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {
        $user_id = random_num(20);

        $create_table_query = "CREATE TABLE IF NOT EXISTS users (
                                id INT(11) AUTO_INCREMENT PRIMARY KEY,
                                user_id VARCHAR(20) NOT NULL,
                                user_name VARCHAR(50) NOT NULL,
                                password VARCHAR(255) NOT NULL
                              )";
        mysqli_query($con, $create_table_query);

        $query = "INSERT INTO users (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$password')";

        mysqli_query($con, $query);

        header("Location: login.php");
        die;
    } else {
        echo "Please enter some valid information!";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        #box {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        #box h2 {
            margin-bottom: 20px;
            color: #333;
        }

        #text {
            height: 40px;
            border-radius: 5px;
            padding: 10px;
            border: solid 1px #ddd;
            width: 100%;
            margin-bottom: 20px;
            font-size: 16px;
        }

        #button {
            padding: 10px;
            width: 100%;
            color: #fff;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-bottom: 20px;
        }

        #button:hover {
            background-color: #218838;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div id="box">
        <h2>Signup</h2>
        <form method="post">
            <input id="text" type="text" name="user_name" placeholder="Username"><br>
            <input id="text" type="password" name="password" placeholder="Password"><br>
            <input id="button" type="submit" value="Signup"><br>
            <a href="login.php">Click to Login</a><br>
        </form>
    </div>
</body>
</html>