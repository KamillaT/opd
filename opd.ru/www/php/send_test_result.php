<?php
    include("./auth_session.php");
    $username = $_SESSION["username"];

    $conn = new mysqli("localhost", "root", "");

    $db = 'users';
    $conn->select_db($db);

    $table_name = "tests_info";
    $query_table = "CREATE TABLE IF NOT EXISTS $table_name (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR (255) NOT NULL)";
    $conn->query($query_table);
    $result = $conn->query("SELECT * FROM $table_name");
    if ($result->num_rows==0) {
        $conn->query("INSERT INTO $table_name(name) VALUES ('Свет')");
        $conn->query("INSERT INTO $table_name(name) VALUES ('Свет_1')");
        $conn->query("INSERT INTO $table_name(name) VALUES ('Свет_2')");
        $conn->query("INSERT INTO $table_name(name) VALUES ('Точность реакции (простая)')");
        $conn->query("INSERT INTO $table_name(name) VALUES ('РДО (cложная)')");    
        $conn->query("INSERT INTO $table_name(name) VALUES ('Звук')");    
        $conn->query("INSERT INTO $table_name(name) VALUES ('Сложение (текст)')");
        $conn->query("INSERT INTO $table_name(name) VALUES ('Аналоговое преследование')");
        $conn->query("INSERT INTO $table_name(name) VALUES ('Внимание')");
        $conn->query("INSERT INTO $table_name(name) VALUES ('Аналоговое слежение')");
    }
	$table_name = "test_results";
    // $query_table = "CREATE TABLE IF NOT EXISTS $table_name (id INT PRIMARY KEY AUTO_INCREMENT, user_id INT NOT NULL, test_id INT NOT NULL,
    //                 FOREIGN KEY (user_id) REFERENCES user_data (id), FOREIGN KEY (test_id) REFERENCES tests_info (id))";
    // $conn->query($query_table);
	$query_table = "CREATE TABLE IF NOT EXISTS $table_name (id INT PRIMARY KEY AUTO_INCREMENT, user_id INT NOT NULL, test_id INT NOT NULL, 
                    test_name VARCHAR (255) NOT NULL, avg_time VARCHAR(255) NOT NULL, total_time VARCHAR(255) NOT NULL, correct VARCHAR(255) NOT NULL,
                    misses VARCHAR(255) NOT NULL, score VARCHAR(255) NOT NULL,
                    FOREIGN KEY (user_id) REFERENCES user_data (id), FOREIGN KEY (test_id) REFERENCES tests_info (id))";
	$conn->query($query_table);
	
    $result_1 = $conn->query("SELECT * FROM user_data WHERE username = '$username'");
    $r = $result_1->fetch_array(MYSQLI_ASSOC);
    $user_id = (int)$r['id'];

    $test_name = $_POST["test_name"];
    $result_2 = $conn->query("SELECT * FROM tests_info WHERE name = '$test_name'");
    $r = $result_2->fetch_array(MYSQLI_ASSOC);
    $test_id = (int)$r['id'];

    $avg_time = $_POST["avg_time"];
    $total_time = $_POST["total_time"];
    $correct = $_POST["correct"];
    $misses = $_POST["misses"];
    $score = $_POST["score"];

    // $conn->query("INSERT INTO $table_name(user_id, test_id) VALUES ($user_id, $test_id)");

    $conn->query("INSERT INTO $table_name(user_id, test_id, test_name, avg_time, total_time, correct, misses, score) 
        VALUES ($user_id, $test_id, '$test_name', '$avg_time', '$total_time', '$correct', '$misses', '$score')");

?>