<?php
	$conn = new mysqli("localhost", "root", "");
	$db = "users";
	$query = "CREATE DATABASE IF NOT EXISTS $db";
	$conn->query($query);
	
	$conn->select_db($db);
	
	$table_name = "user_data";
	$query_table = "CREATE TABLE IF NOT EXISTS $table_name (id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR (255) NOT NULL, pswd VARCHAR (255) NOT NULL, state VARCHAR (255) NOT NULL)";
	$conn->query($query_table);
	$result = $conn->query("SELECT * FROM $table_name WHERE username = 'kami'");
	if($result->num_rows == 0) {
		$sql = "INSERT INTO $table_name (username, pswd, state) VALUES ('kami', 'kami', 'Admin/Expert')";
		$conn->query($sql);
	}
	else {
		$sql = "UPDATE $table_name SET state = 'Admin/Expert' WHERE username = '$username'";
		$conn->query($sql);	
	}
	
	$result = $conn->query("SELECT * FROM $table_name WHERE username = 'ruohan'");
	if($result->num_rows == 0) {
		$sql = "INSERT INTO $table_name (username, pswd, state) VALUES ('ruohan', 'ruohan', 'Admin/Expert')";
		$conn->query($sql);
	}
	else {
		$sql = "UPDATE $table_name SET state = 'Admin/Expert' WHERE username = 'ruohan'";
		$conn->query($sql);	
	}
	
	$result = $conn->query("SELECT * FROM $table_name WHERE username = 'tuan'");
	if($result->num_rows == 0) {
		$sql = "INSERT INTO $table_name (username, pswd, state) VALUES ('tuan', 'tuan', 'Admin/Expert')";
		$conn->query($sql);
	}
	else {
		$sql = "UPDATE $table_name SET state = 'Admin/Expert' WHERE username = 'tuan'";
		$conn->query($sql);	
	}

	$username = $_REQUEST['username'];
	$password =  $_REQUEST['password'];
	$result = $conn->query("SELECT * FROM $table_name WHERE username = '$username'");
	if($result->num_rows == 0) {
		$sql = "INSERT INTO $table_name (username, pswd, state) VALUES ('$username', '$password', 'User')";
		$conn->query($sql);
		header('Location: ../login_reg/reg_success.html');
	}
	else {
		header('Location: ../login_reg/reg_unsuccess.html');
	}
	$conn->close();
?>
