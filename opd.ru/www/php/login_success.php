<?php
    include("./auth_session.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ru">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Registration page</title>
<link rel="stylesheet" href="../css/style.css" />
</head>
<body>
    <div>
        <ul>
            <li><a href="../after_login/index.html">Главная</a></li>
            <li><a href="../after_login/list_expert.html">Эксперты</a></li>
            <li><a href="../after_login/test.html">Тестированиe</a></li>
            <li><a href="../after_login/personal_account.php">Личный кабинет</a></li>
            <li style="float: right"><a href="../index.html">Выйти</a> 
        </ul>
    </div>
    <div class="sitplace"></div>
<div>
<h2>Успешно! Текущий сеанс: <?php echo $_SESSION['username'];?></h2>
<?php
    $conn = new mysqli("localhost", "root", "", "users");
    $username = $_SESSION['username'];
    $age = $conn->query("SELECT age FROM user_data WHERE username='$username'")->fetch_array(MYSQLI_ASSOC)['age'];
    // echo '<p>Ваш возраст: '.$age.'</p>';
?>
<!-- <h2><a href="logout.php">Logout</a></h2> -->
</div>
</body>
</html>
