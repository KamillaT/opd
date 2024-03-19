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
<div>
    <a href="test_results.php">Результаты тестирований</a>
    <?php
        $conn = new mysqli("localhost", "root", "", "users");
        $username = $_SESSION['username'];
        $result = $conn->query("SELECT * FROM user_data WHERE username = '$username'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $state = $row['state'];
        if ($state == 'Admin') {
            echo '<a href="change_user_state.html">Редактировать статусы</a>';
        }
        else if ($state == 'Expert') {
            echo '<a href="change_mark.html">Редактировать оценку</a>';
        }
        else if ($state == 'Admin/Expert') {
            echo '<a href="change_user_state.html">Редактировать статусы</a>';
            echo '<a href="change_mark.html">Редактировать оценку</a>';
        }
    ?>
</div>
</body>
</html>
