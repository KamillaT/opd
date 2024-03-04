<?php
    include("../auth_session.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Personal account</title>
<link rel="stylesheet" href="../../style.css" />
<link rel="stylesheet" href="../../css/reg_form_style.css" />
</head>
<body>
<div class="headerpage"></div>
    <div>
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="list_expert.php">Эксперты</a></li>
            <li><a href="list_profess.php">Профессия</a></li>
            <li><a href="../../after login/test2.html">Тестирование</a></li>
            <li style="float: right;"><a href="personal_account.php">Личный кабинет</a></li>
        </ul>
    </div>
    <div class="sitplace"></div>
<h1>Привет, <?php echo $_SESSION['username'];?>!</h1>
<hr/>
<div class="button_menu">
    <a href="test.php" class="b1">Test</a>
    <a href="index.php" class="b1">Main</a>
</div>
<hr/>
<div>
    <h2>Результаты тестирований</h2>
    <?php
        $conn = new mysqli("localhost", "root", "", "users");
        $username = $_SESSION['username'];
        $result = $conn->query("SELECT id FROM user_data WHERE username = '$username'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $user_id = (int) $row['id'];

        $check_table = $conn->query("SHOW TABLES LIKE 'test_results'");
        if ($check_table->num_rows==0) {
            echo '<p>Результатов пока что нет!</p>';
        }
        else {
            $res = $conn->query("SELECT * FROM test_results WHERE user_id = $user_id");
            if ($res->num_rows==0) {
                echo '<p>Результатов пока что нет!</p>';
            }
            else {
                echo '<table style="width: 100%; background-color: rgba(227, 196, 244, 0.4); border-collapse: collapse;"><tr><th>Тест</th><th>avg_time</th><th>total_time</th><th>correct</th><th>misses</th><th>score</th></tr>';
                while ($r = $res->fetch_array(MYSQLI_ASSOC)) {
                    echo '<tr><td>'.$r['test_name'].'</td><td>'.$r['avg_time'].'</td><td>'.$r['total_time'].'</td><td>'.$r['correct'].'</td><td>'.$r['misses'].'</td><td>'.$r['score'].'</td></tr>';
                }
            }
        }
    ?>
</div>
</body>
</html>