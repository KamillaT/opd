<?php
    include("../php/auth_session.php");
    include("../php/experts_marks.php");
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
    <h2>Редактировать оценку</h2>

</div>
</body>
</html>
