<?php
    include("../auth_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Эксперты</title>
    <link rel="stylesheet" href="../../style.css">
    <style>
        table {
            text-align: center;
            width: 100%;
            background-color:rgba(227, 196, 244, 0.4);
            border-collapse: collapse;
        }
        th{
            border-right: 1px  rgb(30, 125, 136);
        }
    </style>
</head>
<body>
    <div>
        <ul>
            <li><a href="index.php">Main.page</a></li>
            <li><a href="list_expert.php">Эксперты</a></li>
            <li><a href="list_profess.php">Профессия</a>
            <li style="float: right;"><a href="personal_account.php">Личный кабинет</a></li>
        </ul>
    </div>
    <div class="sitplace"></div>
    <div class="listTema">
        <h1>Список Эксперты</h1>
    </div>
    <hr/>
    <!-- <button>Редоктировать</button>
    <button>Добавить</button> -->
    <form action="">
        <table>
            <tr style="height: 40px;">
                <th>ФИО</th>
                <th>Роль</th>
                <th>Телефон</th>
                <th>Операция</th>
            </tr>
        </table>
    </form>
</body>
</html>