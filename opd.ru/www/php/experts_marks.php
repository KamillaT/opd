<?php
	$conn = new mysqli("localhost", "root", "", "users");
	
	$table_name = "expets_marks_test";
	//$query_table = "CREATE TABLE IF NOT EXISTS marks (id INT PRIMARY KEY AUTO_INCREMENT, mark INT NOT NULL)";
	$query_table = "CREATE TABLE IF NOT EXISTS $table_name (id INT PRIMARY KEY AUTO_INCREMENT, 
		expert_id INT NOT NULL,
		job_id INT NOT NULL, 
		memory INT NOT NULL, 
		effciency INT NOT NULL, 
		oral_skills INT NOT NULL, 
		prof_vocab INT NOT NULL, 
		creativity INT NOT NULL, 
		logic INT NOT NULL, 
		communication INT NOT NULL, 
		time_manag INT NOT NULL)";
	$conn->query($query_table);
	
	$conn->close();
?>
