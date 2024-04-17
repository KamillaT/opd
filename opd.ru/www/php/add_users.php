<?php
	$conn = new mysqli("localhost", "root", "");
	$db = "users";
	$query = "CREATE DATABASE IF NOT EXISTS $db";
	$conn->query($query);
	
	$conn->select_db($db);
	
	$table_name = "user_data";
	$query_table = "CREATE TABLE IF NOT EXISTS $table_name (id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR (255) NOT NULL, 
		pswd VARCHAR (255) NOT NULL, state VARCHAR (255) NOT NULL, age VARCHAR (45)  NOT NULL)";
	$conn->query($query_table);
	$result = $conn->query("SELECT * FROM $table_name WHERE username = 'kami'");
	if($result->num_rows == 0) {
		$sql = "INSERT INTO $table_name (username, pswd, state, age, gender) VALUES ('kami', 'kami', 'Admin/Expert', '2005', 'female')";
		$conn->query($sql);
	}
	else {
		$sql = "UPDATE $table_name SET state = 'Admin/Expert' WHERE username = '$username'";
		$conn->query($sql);	
	}
	
	$result = $conn->query("SELECT * FROM $table_name WHERE username = 'ruohan'");
	if($result->num_rows == 0) {
		$sql = "INSERT INTO $table_name (username, pswd, state, age, gender) VALUES ('ruohan', 'ruohan', 'Admin/Expert', '2005', 'female')";
		$conn->query($sql);
	}
	else {
		$sql = "UPDATE $table_name SET state = 'Admin/Expert' WHERE username = 'ruohan'";
		$conn->query($sql);	
	}
	
	$result = $conn->query("SELECT * FROM $table_name WHERE username = 'tuan'");
	if($result->num_rows == 0) {
		$sql = "INSERT INTO $table_name (username, pswd, state, age, gender) VALUES ('tuan', 'tuan', 'Admin/Expert', '2005', 'male')";
		$conn->query($sql);
	}
	else {
		$sql = "UPDATE $table_name SET state = 'Admin/Expert' WHERE username = 'tuan'";
		$conn->query($sql);	
	}

	// debug_to_console("test");
	$username = $_POST['username'];
	$password =  $_POST['password'];
	$birth = $_POST['birth'];
	$gender = $_POST['gender'];
	// debug_to_console($username, $password, $birth, $gender);
	$result = $conn->query("SELECT * FROM $table_name WHERE username = '$username'");
	if($result->num_rows == 0) {
		$sql = "INSERT INTO $table_name (username, pswd, state, age, gender) VALUES ('$username', '$password', 'User', '$birth', '$gender')";
		$conn->query($sql);
		header('Location: ../login_reg/reg_success.html');
	}
	else {
		header('Location: ../login_reg/reg_unsuccess.html');
	}
	$conn->close();
?>