<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "wrong username or password!";
		}else
		{
			echo "wrong username or password!";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
			background-color: #007BFF;
			border: none;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;
			margin-bottom: 20px;
		}

		#button:hover {
			background-color: #0056b3;
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
		<h2>Login</h2>
		<form method="post">
			<input id="text" type="text" name="user_name" placeholder="Username"><br>
			<input id="text" type="password" name="password" placeholder="Password"><br>
			<input id="button" type="submit" value="Login"><br>
			<a href="signup.php">Click to Signup</a><br>
		</form>
	</div>
</body>
</html>