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
            <li><a href="index.php">Main.page</a></li>
            <li><a href="list_expert.php">Эксперты</a></li>
            <li><a href="list_profess.php">Профессия</a>
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
    <a href="#">Результаты тестирований</a>
    <?php
        $conn = new mysqli("localhost", "root", "", "users");
        $username = $_SESSION['username'];
        $result = $conn->query("SELECT * FROM user_data WHERE username = '$username'");
        $row = $result->fetch_array(MYSQLI_ASSOC);
        $state = $row['state'];
        if ($state == 'Admin') {
            echo '<a href="#">Редактировать статусы</a>';
        }
    ?>
</div>
</body>
</html>