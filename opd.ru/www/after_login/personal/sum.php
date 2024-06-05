<?php
    $conn = new mysqli("localhost", "root", "", "users");
    $username = $_SESSION['username'];
    $result = $conn->query("SELECT id FROM user_data WHERE username = '$username'");
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $uid = (int) $row['id'];
    $sql = "SELECT * FROM test_results WHERE user_id = '$uid'";
    $result = $conn->query($sql);

    $data1 = array();
    $data2 = array();
    $data3 = array();
    $data4 = array();
    $data5 = array();
    $data6 = array();
    $data7 = array();
    $data8 = array();
    $data9 = array();
    $data10 = array();
    $data11 = array();
    $data12 = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            switch($row['test_id']){
                case 1:
                    $data1[] = round($row['score'], 2);
                    break;
                case 2:
                    $data2[] = round($row['score'], 2);
                    break;
                case 3:
                    $data3[] = round($row['score'], 2);
                    break;
                case 4:
                    $data4[] = round($row['score'], 2);
                    break;
                case 5:
                    $data5[] = round($row['score'], 2);
                    break;
                case 6:
                    $data6[] = round($row['score'], 2);
                    break;
                case 7:
                    $data7[] = round($row['score'], 2);
                    break;
                case 8:
                    $data8[] = round($row['score'], 2);
                    break;
                case 9:
                    $data9[] = round($row['score'], 2);
                    break;
                case 10:
                    $data10[] = round($row['score'], 2);
                    break;
                case 11:
                    $data11[] = round($row['score'], 2);
                    break;
                case 12:
                    $data12[] = round($row['score'], 2);
                    break;
            }
        }
    }
    function calculateResult($datasets){
        if (empty($datasets)) return 0;
        $sum = 0;
        for($i = 0; $i <  count($datasets); $i++) {
             $sum += $datasets[$i];
        }
        $sum = round($sum / count($datasets), 2);
        return $sum;
    }
    $sum1 = calculateResult($data1);
    $sum2 = calculateResult($data2);
    $sum3 = calculateResult($data3);
    $sum4 = calculateResult($data4);
    $sum5 = calculateResult($data5);
    $sum6 = calculateResult($data6);
    $sum7 = calculateResult($data7);
    $sum8 = calculateResult($data8);
    $sum9 = calculateResult($data9);
    $sum10 = calculateResult($data10);
    $sum11 = calculateResult($data11);
    $sum12 = calculateResult($data12);

    $result1 = round(($sum1*2 + $sum2*2 + $sum3*8 + $sum4*8 + $sum5*10 + $sum6*8 + $sum7*10 + $sum8*8 + $sum9*8 + $sum10*10 + $sum11*8 + $sum12*10)/100, 0);
    $result2 = round(($sum1*8 + $sum2*8 + $sum3*10 + $sum4*10 + $sum6*10 + $sum8*10 + $sum9*10 + $sum10*8 + $sum11*10 + $sum12*8)/100, 0);
    $result3 = round(($sum1*10 + $sum2*10 + $sum3*10 + $sum5*10 + $sum6*10 + $sum7*8 + $sum9*10 + $sum10*8 + $sum11*8 + $sum12*8)/100, 0);


    $results = array("Инженер Backend-разработчика"=>$result1, "Инженер-разработчик баз данных"=>$result2, "Инженер по фронтенд-разработке"=>$result3);
    $max_value = max($results);
    $max_jobs = array();
    foreach($results as $job => $value) {
        if ($value == $max_value) {
            $max_jobs[] = $job;
        }
    }

    $conn->close();
?>