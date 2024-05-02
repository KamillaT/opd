<?php
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

    $conn->close();
?>