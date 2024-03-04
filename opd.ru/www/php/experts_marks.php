<?php
	$conn = new mysqli("localhost", "root", "", "users");
	
	$table_name = "expets_marks_test";
	$query_table = "CREATE TABLE IF NOT EXISTS $table_name (id INT PRIMARY KEY AUTO_INCREMENT, expert_id INT NOT NULL, something VARCHAR (255) NOT NULL, FOREIGN KEY (expert_id) REFERENCES user_data (id))";
	$conn->query($query_table);
	
	$conn->close();
?>
