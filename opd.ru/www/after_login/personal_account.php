<?php
    include("../php/auth_session.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Personal account</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
<div class="headerpage"></div>
    <div>
        <ul>
            <li><a href="index.html">Главная</a></li>
            <li><a href="list_expert.html">Эксперты</a></li>
            <li><a href="test.html">Тестирование</a></li>
            <li><a href="personal_account.php">Личный кабинет</a></li>
            <li style="float: right"><a href="../index.html">Выйти</a> 
        </ul>
    </div>
    <div class="sitplace"></div>
<h1>Привет, <?php echo $_SESSION['username'];?>!</h1>
<hr/>
<div class="button_menu">
    <?php
        function setAgeCategory($conn, $birth, $id) {
            $year = (int) date('Y');
            $born_year = (int) $birth;
            $age = abs($born_year - $year);
    
            if ($age <= 4) {
                $update_sql = "UPDATE user_age_category SET age_cat_id = 1 WHERE user_id = $id";
                $conn->query($update_sql);
                } elseif ($age <= 9) {
                    $update_sql = "UPDATE user_age_category SET age_cat_id = 2 WHERE user_id = $id";
                    $conn->query($update_sql);
                    } elseif ($age <= 14) {
                        $update_sql = "UPDATE user_age_category SET age_cat_id = 3 WHERE user_id = $id";
                        $conn->query($update_sql);
                        } elseif ($age <= 19) {
                            $update_sql = "UPDATE user_age_category SET age_cat_id = 4 WHERE user_id = $id";
                            $conn->query($update_sql);
                            } elseif ($age <= 24) {
                                $update_sql = "UPDATE user_age_category SET age_cat_id = 5 WHERE user_id = $id";
                                $conn->query($update_sql);
                                } elseif ($age <= 29) {
                                    $update_sql = "UPDATE user_age_category SET age_cat_id = 6 WHERE user_id = $id";
                                    $conn->query($update_sql);
                                    } elseif ($age <= 34) {
                                        $update_sql = "UPDATE user_age_category SET age_cat_id = 7 WHERE user_id = $id";
                                        $conn->query($update_sql);
                                        }  elseif ($age <= 39) {
                                            $update_sql = "UPDATE user_age_category SET age_cat_id = 8 WHERE user_id = $id";
                                            $conn->query($update_sql);
                                            } elseif ($age <= 44) {
                                                $update_sql = "UPDATE user_age_category SET age_cat_id = 9 WHERE user_id = $id";
                                                $conn->query($update_sql);
                                                } elseif ($age <= 49) {
                                                    $update_sql = "UPDATE user_age_category SET age_cat_id = 10 WHERE user_id = $id";
                                                    $conn->query($update_sql);
                                                    }
        }
        $conn = new mysqli("localhost", "root", "", "users");
        $username = $_SESSION['username'];
        $id = $conn->query("SELECT id FROM user_data WHERE username='$username'")->fetch_array(MYSQLI_ASSOC)['id'];
        $age = $conn->query("SELECT age FROM user_data WHERE username='$username'")->fetch_array(MYSQLI_ASSOC)['age'];
        $birth = (int) $age;
        setAgeCategory($conn, $birth, $id);
        $age_category_id = $conn->query("SELECT age_cat_id FROM user_age_category WHERE user_id = $id")->fetch_array(MYSQLI_ASSOC)['age_cat_id'];
        $min_age = $conn->query("SELECT min_age, max_age FROM age_category WHERE id = $age_category_id")->fetch_array(MYSQLI_ASSOC)['min_age'];
        $max_age = $conn->query("SELECT min_age, max_age FROM age_category WHERE id = $age_category_id")->fetch_array(MYSQLI_ASSOC)['max_age'];
        echo '<p>Год рождения: '.$age.'</p>';
        echo '<p>Возрастная категория: '.$min_age.'-'.$max_age.'</p>';
        echo '<a href="test_results.php" class="b1">Результаты тестирований</a>';
        $result = $conn->query("SELECT * FROM user_data WHERE username = '$username'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $state = $row['state'];
        if ($state == 'Admin') {
            echo '<a href="change_user_state.html" class="b1">Редактировать статусы</a>';
        }
        else if ($state == 'Expert') {
            echo '<a href="change_mark.html" class="b1">Редактировать оценку</a>';
        }
        else if ($state == 'Admin/Expert') {
            echo '<a href="change_user_state.html" class="b1">Редактировать статусы</a>';
            echo '<a href="change_mark.html" class="b1">Редактировать оценку</a>';
        }
    ?>
</div>
</body>
</html>
