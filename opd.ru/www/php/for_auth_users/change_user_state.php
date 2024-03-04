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
    <h2>Редактировать статусы</h2>

    <form method="POST"><label></form>

    <?php
        $conn = new mysqli("localhost", "root", "", "users");
        $result = $conn->query("SELECT * FROM user_data");
        while ($r = $result->fetch_array(MYSQLI_ASSOC)) {
            $username = $r['username'];
            echo '<form method="POST">
                <select name="username">
                <option value="'.$username.'">'.$username.'</option>
                </select>
                <select name="state">
                <option value="Admin">Admin</option>
                <option value="Expert">Expert</option>
                <option value="User">User</option>
                </select>
                <input type="submit" value="submit" name="submit">
                </form>';
        }
        if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $state = $_POST['state'];
            $conn->query("UPDATE user_data SET state = '$state' WHERE username = '$username'");
        }     
    ?>
</div>
</body>
</html>