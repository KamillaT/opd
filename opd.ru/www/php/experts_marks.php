<?php
	$conn = new mysqli("localhost", "root", "");
	
	$table_name = "experts_marks";
	$query_table = "CREATE TABLE IF NOT EXISTS users.$table_name (id INT PRIMARY KEY AUTO_INCREMENT, 
		expert_id INT NOT NULL,
		job_id INT NOT NULL, 
		memory INT NOT NULL, 
		effciency INT NOT NULL, 
		oral_skills INT NOT NULL, 
		prof_vocab INT NOT NULL, 
		creativity INT NOT NULL, 
		logic INT NOT NULL, 
		communication INT NOT NULL, 
		time_manag INT NOT NULL,
		FOREIGN KEY (expert_id) REFERENCES users.user_data (id),
		FOREIGN KEY (job_id) REFERENCES pvk.jobs (id))";
	$conn->query($query_table);
	
	$result = $conn->query("SELECT id FROM users.user_data WHERE username = 'kami'")->fetch_array(MYSQLI_ASSOC);
	$id = $result['id'];
	$res = $conn->query("SELECT * FROM users.$table_name WHERE expert_id=$id");
	if ($res->num_rows==0) {
		$conn->query("INSERT INTO users.$table_name(expert_id, job_id, memory, effciency, oral_skills, prof_vocab, creativity, logic, communication, time_manag)
				VALUES ($id, 1, 75, 75, 60, 65, 40, 75, 75, 90)");
				
		$conn->query("INSERT INTO users.$table_name(expert_id, job_id, memory, effciency, oral_skills, prof_vocab, creativity, logic, communication, time_manag)
				VALUES ($id, 2, 60, 65, 50, 65, 70, 75, 55, 55)");
				
		$conn->query("INSERT INTO users.$table_name(expert_id, job_id, memory, effciency, oral_skills, prof_vocab, creativity, logic, communication, time_manag)
				VALUES ($id, 3, 65, 65, 60, 65, 80, 30, 85, 55)");
	}
	
	$result = $conn->query("SELECT id FROM users.user_data WHERE username = 'ruohan'")->fetch_array(MYSQLI_ASSOC);
	$id = $result['id'];
	$res = $conn->query("SELECT * FROM users.$table_name WHERE expert_id=$id");
	if ($res->num_rows==0) {
		$conn->query("INSERT INTO users.$table_name(expert_id, job_id, memory, effciency, oral_skills, prof_vocab, creativity, logic, communication, time_manag)
				VALUES ($id, 1, 70, 80, 55, 60, 45, 70, 75, 85)");
				
		$conn->query("INSERT INTO users.$table_name(expert_id, job_id, memory, effciency, oral_skills, prof_vocab, creativity, logic, communication, time_manag)
				VALUES ($id, 2, 65, 60, 45, 60, 65, 70, 50, 60)");
				
		$conn->query("INSERT INTO users.$table_name(expert_id, job_id, memory, effciency, oral_skills, prof_vocab, creativity, logic, communication, time_manag)
				VALUES ($id, 3, 60, 60, 65, 65, 75, 35, 80, 45)");
	}
	
	$result = $conn->query("SELECT id FROM users.user_data WHERE username = 'tuan'")->fetch_array(MYSQLI_ASSOC);
	$id = $result['id'];
	$res = $conn->query("SELECT * FROM users.$table_name WHERE expert_id=$id");
	if ($res->num_rows==0) {
		$conn->query("INSERT INTO users.$table_name(expert_id, job_id, memory, effciency, oral_skills, prof_vocab, creativity, logic, communication, time_manag)
				VALUES ($id, 1, 75, 75, 60, 65, 40, 80, 75, 95)");
				
		$conn->query("INSERT INTO users.$table_name(expert_id, job_id, memory, effciency, oral_skills, prof_vocab, creativity, logic, communication, time_manag)
				VALUES ($id, 2, 70, 65, 45, 65, 70, 75, 55, 50)");
				
		$conn->query("INSERT INTO users.$table_name(expert_id, job_id, memory, effciency, oral_skills, prof_vocab, creativity, logic, communication, time_manag)
				VALUES ($id, 3, 65, 70, 60, 65, 80, 30, 85, 50)");
	}
	
	$conn->close();
?>
