<?php
	function setAgeCategory($conn, $birth, $id) {
		$year = (int) date('Y');
		$born_year = (int) $birth;
		$age = abs($born_year - $year);

		if ($age <= 4) {
			$update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (1, $id)";
			$conn->query($update_sql);
			} elseif ($age <= 9) {
				$update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (2, $id)";
				$conn->query($update_sql);
				} elseif ($age <= 14) {
					$update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (3, $id)";
					$conn->query($update_sql);
					} elseif ($age <= 19) {
						$update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (4, $id)";
						$conn->query($update_sql);
						} elseif ($age <= 24) {
							$update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (5, $id)";
							$conn->query($update_sql);
							} elseif ($age <= 29) {
								$update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (6, $id)";
								$conn->query($update_sql);
								} elseif ($age <= 34) {
									$update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (7, $id)";
									$conn->query($update_sql);
									}  elseif ($age <= 39) {
										$update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (8, $id)";
										$conn->query($update_sql);
										} elseif ($age <= 44) {
											$update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (9, $id)";
											$conn->query($update_sql);
											} elseif ($age <= 49) {
												$update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (10, $id)";
												$conn->query($update_sql);
												}
	}

	$conn = new mysqli("localhost", "root", "", "users");

	$table_name = "age_category";
    $result = $conn->query("SHOW TABLES LIKE '$table_name'");
    if($result->num_rows == 0) {
        // Table does not exist, create it
        $query_table = "CREATE TABLE IF NOT EXISTS $table_name (id INT AUTO_INCREMENT PRIMARY KEY, min_age INT, max_age INT)";
        $conn->query($query_table);
        // SQL queries
        $sql1 = "INSERT INTO age_category (min_age, max_age) VALUES (0, 4)";
        $sql2 = "INSERT INTO age_category (min_age, max_age) VALUES (5, 9)";
        $sql3 = "INSERT INTO age_category (min_age, max_age) VALUES (10, 14)";
        $sql4 = "INSERT INTO age_category (min_age, max_age) VALUES (15, 19)";
        $sql5 = "INSERT INTO age_category (min_age, max_age) VALUES (20, 24)";
        $sql6 = "INSERT INTO age_category (min_age, max_age) VALUES (25, 29)";
        $sql7 = "INSERT INTO age_category (min_age, max_age) VALUES (30, 34)";
        $sql8 = "INSERT INTO age_category (min_age, max_age) VALUES (35, 39)";
        $sql9 = "INSERT INTO age_category (min_age, max_age) VALUES (39, 44)";
        $sql10 = "INSERT INTO age_category (min_age, max_age) VALUES (45, 49)";

        // Execute SQL queries
        $conn->query($sql1);
        $conn->query($sql2);
        $conn->query($sql3);
        $conn->query($sql4);
        $conn->query($sql5);
        $conn->query($sql6);
        $conn->query($sql7);
        $conn->query($sql8);
        $conn->query($sql9);
        $conn->query($sql10);

        if ($conn->query($sql) === TRUE) {
            echo "Table created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }

	$table_name = "user_age_category";
    $result = $conn->query("SHOW TABLES LIKE '$table_name'");
    if($result->num_rows == 0) {
        // Table does not exist, create it
        $query_table = "CREATE TABLE IF NOT EXISTS $table_name (id INT AUTO_INCREMENT PRIMARY KEY, age_cat_id INT, user_id INT,
                        FOREIGN KEY (age_cat_id) REFERENCES age_category (id),
                        FOREIGN KEY (user_id) REFERENCES user_data (id))";
        $conn->query($query_table);
	}

	$conn = new mysqli("localhost", "root", "");
	$db = "users";
	$query = "CREATE DATABASE IF NOT EXISTS $db";
	$conn->query($query);
	
	$conn->select_db($db);
	
	$table_name = "user_data";
	$query_table = "CREATE TABLE IF NOT EXISTS $table_name (id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR (255) NOT NULL, 
		pswd VARCHAR (255) NOT NULL, age VARCHAR (45) NOT NULL, admin BOOLEAN NOT NULL, expert BOOLEAN NOT NULL, user BOOLEAN NOT NULL)";
	$conn->query($query_table);
	$result = $conn->query("SELECT * FROM $table_name WHERE username = 'kami'");
	if($result->num_rows == 0) {
		$sql = "INSERT INTO $table_name (username, pswd, age, gender, admin, expert, user) VALUES ('kami', 'kami', '2005', 'female', 1, 1, 1)";
		$conn->query($sql);
		setAgeCategory($conn, 2005, 1);
	}
	else {
		$sql = "UPDATE $table_name SET admin = 1 WHERE username = '$username'";
		$conn->query($sql);
		$sql = "UPDATE $table_name SET expert = 1 WHERE username = '$username'";
		$conn->query($sql);
		$sql = "UPDATE $table_name SET user = 1 WHERE username = '$username'";
		$conn->query($sql);
		setAgeCategory($conn, 2005, 1);
	}
	
	$result = $conn->query("SELECT * FROM $table_name WHERE username = 'ruohan'");
	if($result->num_rows == 0) {
		$sql = "INSERT INTO $table_name (username, pswd, age, gender, admin, expert, user) VALUES ('ruohan', 'ruohan', '2003', 'female', 1, 1, 1)";
		$conn->query($sql);
		setAgeCategory($conn, 2003, 2);
	}
	else {		
		$sql = "UPDATE $table_name SET admin = 1 WHERE username = '$username'";
		$conn->query($sql);
		$sql = "UPDATE $table_name SET expert = 1 WHERE username = '$username'";
		$conn->query($sql);
		$sql = "UPDATE $table_name SET user = 1 WHERE username = '$username'";
		$conn->query($sql);
		setAgeCategory($conn, 2003, 2);
	}
	
	$result = $conn->query("SELECT * FROM $table_name WHERE username = 'tuan'");
	if($result->num_rows == 0) {
		$sql = "INSERT INTO $table_name (username, pswd, age, gender, admin, expert, user) VALUES ('tuan', 'tuan', '2003', 'male', 1, 1, 1)";
		$conn->query($sql);
		setAgeCategory($conn, 2003, 3);
	}
	else {
		$sql = "UPDATE $table_name SET admin = 1 WHERE username = '$username'";
		$conn->query($sql);
		$sql = "UPDATE $table_name SET expert = 1 WHERE username = '$username'";
		$conn->query($sql);
		$sql = "UPDATE $table_name SET user = 1 WHERE username = '$username'";
		$conn->query($sql);
		setAgeCategory($conn, 2003, 3);
	}
	
	session_start();
	if (isset($_POST['username'])) {
		$username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
		$query = "SELECT * FROM user_data WHERE username = '$username' AND pswd = '$password'";
		$result = mysqli_query($conn, $query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		if ($rows == 1) {
			$_SESSION['username'] = $username;
			header("Location: login_success.php");
		}
		else {
			header("Location: ../login_reg/login_unsuccess.html");
		}
	}
	else {
		header("Location: ../login_reg/unexpected_error.html");
	}
	$conn->close();
?>
