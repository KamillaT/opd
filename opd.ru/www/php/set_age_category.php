<?php
    $conn = new mysqli("localhost", "root", "", "users");
    
    $table_name = "user_age_category";
    $result = $conn->query("SHOW TABLES LIKE '$table_name'");
    if($result->num_rows == 0) {
        // Table does not exist, create it
        $query_table = "CREATE TABLE IF NOT EXISTS $table_name (id INT AUTO_INCREMENT PRIMARY KEY, age_cat_id INT, user_id INT,
                        FOREIGN KEY (age_cat_id) REFERENCES age_category (id),
                        FOREIGN KEY (user_id) REFERENCES user_data (id))";
        $conn->query($query_table);
        
        $sql = "SELECT * FROM user_data";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Update user_age_category table
            while($row = $result->fetch_assoc()) {
                $id = $row["id"];
                $born_year = $row["age"];
                $year = (int) date('Y');
                $age = abs($born_year - $year);
                
                // Insert/update the column value in user_age_category table
                if ($age <= 4) {
                $update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (1, $id)";
                } elseif ($age <= 9) {
                    $update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (2, $id)";
                    } elseif ($age <= 14) {
                        $update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (3, $id)";
                        } elseif ($age <= 19) {
                            $update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (4, $id)";
                            } elseif ($age <= 24) {
                                $update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (5, $id)";
                                } elseif ($age <= 29) {
                                    $update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (6, $id)";
                                    } elseif ($age <= 34) {
                                        $update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (7, $id)";
                                        }  elseif ($age <= 39) {
                                            $update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (8, $id)";
                                            } elseif ($age <= 44) {
                                                $update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (9, $id)";
                                                } elseif ($age <= 49) {
                                                    $update_sql = "INSERT INTO user_age_category (age_cat_id, user_id) VALUES (10, $id)";
                                                    }
                if ($conn->query($update_sql) === TRUE) {
                    echo "Column value updated successfully";
                    echo "\n";
                } else {
                    echo "Error updating column value: " . $conn->error;
                    echo "\n";
                }
            }
        } else {
            echo "No rows found in user_data table";
        }

        if ($conn->query($sql) === TRUE) {
            echo "Table created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }
    }

    $conn->close();
?>