<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Профессия</title> 
    <link rel="stylesheet" href="../css/style.css"> 
    <style> 
    .container2{ 
        position: relative; 
        display: flex; 
        justify-content: center; 
        align-items: center; 
        flex-wrap: wrap; 
        gap: 100px 50px; 
        padding: 100px 50px; 
    } 
 
    .container2 .card{ 
        position: relative; 
        display: flex; 
        justify-content: center; 
        align-items: flex-start; 
        width: 350px; 
        height: 300px; 
        background: #fff; 
        border-radius: 20px; 
        box-shadow: 0 35px 80px rgba(176, 175, 74, 0.3);
        transition: all 0.5s ease;  
    } 
 
    .container2 .card:hover{ 
        height: 800px; 
    } 
 
    .container2 .card .imgBx{ 
        position: absolute; 
        top: 20px; 
        width: 300px; 
        height: 200px; 
        background: #333; 
        border-radius: 12px; 
        transition: all 0.5s ease; 
    } 
 
    .container2 .card:hover .imgBx{ 
        top: -100px; 
        scale: 0.75; 
        box-shadow: 0 15px 45px rgba(0,0,0,0.3); 
    } 
 
    .container2 .card .imgBx img{ 
        position: absolute; 
        top: 0; 
        left: 0; 
        width: 100%; 
        height: 100%; 
        object-fit: cover; 
        border-radius: 10px; 
    }

    .container2 .card .content{
        position: absolute;
        top: 207px;
        width: 90%;
        padding: 0 30px;
        height: 90px;
        overflow: hidden;
        text-align: center;
        transition: 0.5s; 
    }

    .container2 .card:hover .content{ 
        top: 100px; 
        height: 800px;
        width: 90%;
        transition: 0.5s;
    }

    .container2 .card .content h2{
        font-size: 1.5em;
        font-weight: 700;
        color: var(--clr); 
    }
    </style>
</head>
<body>
    <?php
		$conn = new mysqli("localhost", "root", "");

		$db = "pvk";
		$query = "CREATE DATABASE IF NOT EXISTS $db";
		$conn->query($query);
		$conn->select_db($db);

		$table = "jobs";
		$conn->query("CREATE TABLE IF NOT EXISTS $table (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR (255) NOT NULL)");
		$result = $conn->query("SELECT * FROM $table WHERE name = 'Инженер Backend-разработчика'");
		if($result->num_rows == 0) {
			$sql = "INSERT INTO $table (name) VALUES ('Инженер Backend-разработчика')";
			$conn->query($sql);
		}
		$result = $conn->query("SELECT * FROM $table WHERE name = 'Инженер-разработчик баз данных'");
		if($result->num_rows == 0) {
			$sql = "INSERT INTO $table (name) VALUES ('Инженер-разработчик баз данных')";
			$conn->query($sql);
		}
		$result = $conn->query("SELECT * FROM $table WHERE name = 'Инженер по фронтенд-разработке'");
		if($result->num_rows == 0) {
			$sql = "INSERT INTO $table (name) VALUES ('Инженер по фронтенд-разработке')";
			$conn->query($sql);
		}

		$table = "qualities";
		$conn->query("CREATE TABLE IF NOT EXISTS $table (id INT PRIMARY KEY AUTO_INCREMENT, 
		job_id INT NOT NULL, 
		memory INT NOT NULL, 
		effciency INT NOT NULL, 
		oral_skills INT NOT NULL, 
		prof_vocab INT NOT NULL, 
		creativity INT NOT NULL, 
		logic INT NOT NULL, 
		communication INT NOT NULL, 
		time_manag INT NOT NULL, 
		description VARCHAR (1024) NOT NULL, 
		FOREIGN KEY (job_id) REFERENCES jobs (id))");
		$result = $conn->query("SELECT * FROM $table WHERE job_id = 1");
		if($result->num_rows == 0) {
			$sql = "INSERT INTO qualities(job_id, memory, effciency, oral_skills, prof_vocab, creativity, logic, communication, time_manag, description) VALUES (1, 70, 80, 60, 60, 40, 80, 70, 90, 'Острый взгляд на детали, способность координировать несколько задач, быть организованным и спланированным. Они также хороши в тайм-менеджменте и могут хорошо решать проблемы даже под давлением.')";
			$conn->query($sql);
		}
		$result = $conn->query("SELECT * FROM $table WHERE job_id = 2");
		if($result->num_rows == 0) {
			$sql = "INSERT INTO qualities(job_id, memory, effciency, oral_skills, prof_vocab, creativity, logic, communication, time_manag, description) VALUES (2, 60, 70, 50, 60, 70, 70, 50, 50, 'Инженеры баз данных отвечают за эксплуатацию и обслуживание баз данных, включая основные задачи, такие как установка базы данных, мониторинг, резервное копирование и восстановление. Однако на самом деле нам также необходимо нести ответственность за весь жизненный цикл продукта: от проектирования спроса, тестирования до поставки и запуска. В этом процессе мы несем ответственность не только за создание, эксплуатацию и обслуживание базы данных управления. системы, но также участвовать в раннем проектировании базы данных и промежуточном тестировании базы данных, а также в управлении емкостью базы данных и оптимизации производительности.')";
			$conn->query($sql);
		}
		$result = $conn->query("SELECT * FROM $table WHERE job_id = 3");
		if($result->num_rows == 0) {
			$sql = "INSERT INTO qualities(job_id, memory, effciency, oral_skills, prof_vocab, creativity, logic, communication, time_manag, description) VALUES (3, 60, 60, 60, 60, 80, 30, 80, 50, 'Интерфейсному инженеру необходимо преобразовать проект проекта в веб-страницу и отправить данные, сгенерированные пользователем, на сервер. Ему также нужно, чтобы продакт-менеджер обсудил детали взаимодействия. Это требует от фронтенд-инженеров высоких навыков общения и понимания.')";
			$conn->query($sql);
		}
        
        $name_list=array();
        $result = $conn->query("SELECT * FROM jobs");
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            array_push($name_list, $row['name']);
        }
        
	?>
    <div class="headerpage"></div> 
    <div> 
        <ul> 
            <li><a href="index.html">Главная</a></li> 
            <li><a href="list_expert.html">Эксперты</a></li>
            <li><a href="profession.php">Профессия</a></li>
            <li><a href="test.html">Тестированиe</a></li>
            <li style="float: right"><a href="../profession.php">Выйти</a>
        </ul>
    </div> 
    <div class="sitplace"></div> 
    <div class="listTema"> 
        <h1>Профессия</h1> 
    </div> 
    <hr/> 
    <div class="container2"> 
        <div class="card"> 
            <div class="imgBx" style="--clr:#49cfc2;">
                <img src="../images/front.jpg" alt="">
            </div> 
            <div class="content">
                <?php
                    $j_id = 1;
                    $res = $conn->query("SELECT * FROM qualities WHERE id LIKE $j_id");
                    while ($r = $res->fetch_array(MYSQLI_ASSOC)) {
                        $dict = array(
                            "Память" => $r['memory'],
                            "Эффекктивность" => $r['effciency'],
                            "Навыки устного выражения" => $r['oral_skills'],
                            "Профессиональный словарный запас" => $r['prof_vocab'],
                            "Креативность (гибкость, дивергенция, беглость мышления)" => $r['creativity'],
                            "Способность к логическому рассуждению" => $r['logic'],
                            "Коммуникабельность" => $r['communication'],
                            "Тайм-менеджмент" => $r['time_manag']);
                        arsort($dict);
                        echo '<h2>'.$name_list[$j_id - 1].'</h2>';
                        foreach ($dict as $key => $val) {
                            echo "<p class='attributes'>".$key.': '.$val."\n</p>";
                        }
                        echo '<p>'.$r['description'].'</p>';
                    }
                ?>
            </div> 
        </div> 
        <div class="card"> 
            <div class="imgBx" style="--clr:#d6ae57;">
                <img src="../images/back.jpg" alt="">
            </div> 
            <div class="content">
                <?php
                    $j_id = 2;
                    $res = $conn->query("SELECT * FROM qualities WHERE id LIKE $j_id");
                    while ($r = $res->fetch_array(MYSQLI_ASSOC)) {
                        $dict = array(
                            "Память" => $r['memory'],
                            "Эффекктивность" => $r['effciency'],
                            "Навыки устного выражения" => $r['oral_skills'],
                            "Профессиональный словарный запас" => $r['prof_vocab'],
                            "Креативность (гибкость, дивергенция, беглость мышления)" => $r['creativity'],
                            "Способность к логическому рассуждению" => $r['logic'],
                            "Коммуникабельность" => $r['communication'],
                            "Тайм-менеджмент" => $r['time_manag']);
                        arsort($dict);
                        echo '<h2>'.$name_list[$j_id - 1].'</h2>';
                        foreach ($dict as $key => $val) {
                            echo "<p class='attributes'>".$key.': '.$val."\n</p>";
                        }
                        echo '<p>'.$r['description'].'</p>';
                    }
                ?>
            </div> 
        </div> 
        <div class="card"> 
            <div class="imgBx" style="--clr:#8f63b6;">
                <img src="../images/base.png" alt="">
            </div>
            <div class="content">
                <?php
                    $j_id = 3;;
                    $res = $conn->query("SELECT * FROM qualities WHERE id LIKE $j_id");
                    while ($r = $res->fetch_array(MYSQLI_ASSOC)) {
                        $dict = array(
                            "Память" => $r['memory'],
                            "Эффекктивность" => $r['effciency'],
                            "Навыки устного выражения" => $r['oral_skills'],
                            "Профессиональный словарный запас" => $r['prof_vocab'],
                            "Креативность (гибкость, дивергенция, беглость мышления)" => $r['creativity'],
                            "Способность к логическому рассуждению" => $r['logic'],
                            "Коммуникабельность" => $r['communication'],
                            "Тайм-менеджмент" => $r['time_manag']);
                        arsort($dict);
                        echo '<h2>'.$name_list[$j_id - 1].'</h2>';
                        foreach ($dict as $key => $val) {
                            echo "<p class='attributes'>".$key.': '.$val."\n</p>";
                        }
                        echo '<p>'.$r['description'].'</p>';
                    }
                ?>
            </div> 
        </div>
    </div>
</body> 
</html>