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
    <h2>Редактировать статусы</h2>

    <form method="POST"><label></form>

    <?php
        $conn = new mysqli("localhost", "root", "", "users");
        $result = $conn->query("SELECT * FROM user_data");
        
            echo '<form method="POST">
                <select name="username">';
                while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
            	$username = $r['username'];
                echo '<option value="'.$username.'">'.$username.'</option>';
                }
                echo '</select>
                <select name="admin">
                <option value=1>Админ</option>
                <option value=0>Не админ</option>
                </select>
                </select>
                <select name="expert">
                <option value=1>Эксперт</option>
                <option value=0>Не эксперт</option>
                </select>
                <input type="submit" value="submit" name="submit">
                </form>';
        if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $admin = $_POST['admin'];
            $expert = $_POST['expert'];
            $conn->query("UPDATE user_data SET admin = $admin WHERE username = '$username'");
            $conn->query("UPDATE user_data SET expert = $expert WHERE username = '$username'");
        }   
    ?>
</div>
</body>
</html>
