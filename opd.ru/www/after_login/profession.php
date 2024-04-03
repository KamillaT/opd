<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Профессия</title> 
    <link rel="stylesheet" href="../css/style.css"> 
    <link rel="stylesheet" href="../css/profess.css">
</head>
<body>
    <?php
		$conn = new mysqli("localhost", "root", "", "users");

		// $db = "pvk";
		// $query = "CREATE DATABASE IF NOT EXISTS $db";
		// $conn->query($query);
		// $conn->select_db($db);

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
            <li><a href="test.html">Тестированиe</a></li>
            <li><a href="personal_account.php">Личный кабинет</a></li>
            <li style="float: right"><a href="../php/logout.php">Выйти</a> 
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
    <div class="shell">
        <div class="carousel">
            <ol class="boxs">
                <li class="box">
                    <div class="h2">
                        <h2>Память</h2>
                    </div>
                    <div class="text">
                        <p>Способность мозга, с помощью которой данные или информация кодируются, хранятся и извлекаются при необходимости.</p>
                    </div>
                </li>
                <li class="box">
                    <div class="content">
                        <div class="h2">
                            <h2>Эффективность</h2>
                        </div>
                        <div class="text">
                            <p>способность выполнять работу и достигать необходимого или желаемого результата с наименьшей затратой времени и усилий.</p>
                        </div>
                    </div>
                </li>
                <li class="box">
                    <div class="content">
                        <div class="h2">
                            <h2>Навыки устного выражения</h2>
                        </div>
                        <div class="text">
                            <p> Устные навыки используются для повышения четкости речи в целях эффективного общения.</p>
                        </div>
                    </div>
                </li>
                <li class="box">
                    <div class="content">
                        <div class="h2">
                            <h2>Профессиональный словарный запас</h2>
                        </div>
                        <div class="text">
                            <p>инструмент коммуникации и ключевой идентификатор, отражающий профессиональные знания и навыки.</p>
                        </div>
                    </div>
                </li>
                <li class="box">
                    <div class="content">
                        <div class="h2">
                            <h2>Коммуникабельность</h2>
                        </div>
                        <div class="text">
                            <p>способность к общению, к установке связей, контактов, общительность</p>
                        </div>
                    </div>
                </li>
                <li class="box">
                    <div class="content">
                        <div class="h2">
                            <h2>Креативности</h2>
                        </div>
                        <div class="text">
                            <p>умение человека отступать от стандартных идей, правил и шаблонов.</p>
                        </div>
                    </div>
                </li>
                <li class="box">
                    <div class="content">
                        <div class="h2">
                            <h2>Способность к логическому рассуждению</h2>
                        </div>
                        <div class="text">
                            <p>мыслительный процесс, задействующий логику, и способность видеть закономерности, причинно-следственные связи и оперировать ими в уме.</p>
                        </div>
                    </div>
                </li>
                <li class="box">
                    <div class="content">
                        <div class="h2">
                            <h2>Тайм-менеджмент</h2>
                        </div>
                        <div class="text">
                            <p>техника организации осознанного контроля и распределения времени.</p>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
        <div class="arrows">
            <button class="up"><i class="icon-shangjiantou"></i></button>
            <button class="next"><i class="icon-xiajiantou"></i></button>
        </div>
    </div>
</body> 
<script>
    const shell = document.querySelector('.boxs');
    const cells = shell.querySelectorAll('.box');
    const cellWidth = shell.offsetWidth;
    const cellHeight = shell.offsetHeight;
    const cellSize = cellHeight;
    const cellCount = 8;
    const radius = Math.round((cellSize/1.8)/Math.tan(Math.PI/cellCount));
    const theta = 360/cellCount;
    let selectedIndex = 0;
    function rotateshell(){
        const angle = theta* selectedIndex * -1;
        shell.style.transform = "translateZ(" + -radius + "px) rotateX(" + -angle + "deg)";
        const cellIndex = selectedIndex < 0 ? (cellCount - ((selectedIndex * -1) % cellCount)) : (selectedIndex % cellCount);
        cells.forEach((cell, index) =>{
            if(cellIndex === index) {
                cell.classList.add("selected");
            }else{
                cell.classList.remove("selected");
            }
        });
    }
    function selectPrev(){
        selectedIndex--;
        rotateshell();
    }
    function selectNext(){
        selectedIndex++;
        rotateshell();
    }
    const prevButton = document.querySelector(".up");
    prevButton.addEventListener("click", selectPrev);
    const nextButton = document.querySelector(".next");
    nextButton.addEventListener("click", selectNext);

    function initshell(){
        cells.forEach((cell, i) => {
            const cellAngle = theta * i;
            cell.style.transform = "rotateX(" + -cellAngle + "deg) translateZ(" + radius + "px)";
        });
        rotateshell();
    }
    initshell();
</script>
</html>