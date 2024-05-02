<?php
// Get the raw POST data
$inputJSON = file_get_contents('php://input');

// Decode the JSON data into a PHP associative array
$data = json_decode($inputJSON, true);
// foreach ($data[0] as $dat) {
//     echo "$dat ";
// }
// print_r(array_keys($data[0]));
$conn = new mysqli("localhost", "root", "", "users");

$job_id = $data[8]['id'];
$expert_id = $data[8]['val'];

$quality = $data[0]['id'];
$value = $data[0]['val'];
$conn->query("UPDATE experts_marks SET $quality=$value WHERE expert_id=$expert_id AND job_id=$job_id");

$quality = $data[1]['id'];
$value = $data[1]['val'];
$conn->query("UPDATE experts_marks SET $quality=$value WHERE expert_id=$expert_id AND job_id=$job_id");

$quality = $data[2]['id'];
$value = $data[2]['val'];
$conn->query("UPDATE experts_marks SET $quality=$value WHERE expert_id=$expert_id AND job_id=$job_id");

$quality = $data[3]['id'];
$value = $data[3]['val'];
$conn->query("UPDATE experts_marks SET $quality=$value WHERE expert_id=$expert_id AND job_id=$job_id");

$quality = $data[4]['id'];
$value = $data[4]['val'];
$conn->query("UPDATE experts_marks SET $quality=$value WHERE expert_id=$expert_id AND job_id=$job_id");

$quality = $data[5]['id'];
$value = $data[5]['val'];
$conn->query("UPDATE experts_marks SET $quality=$value WHERE expert_id=$expert_id AND job_id=$job_id");

$quality = $data[6]['id'];
$value = $data[6]['val'];
$conn->query("UPDATE experts_marks SET $quality=$value WHERE expert_id=$expert_id AND job_id=$job_id");

$quality = $data[7]['id'];
$value = $data[7]['val'];
$conn->query("UPDATE experts_marks SET $quality=$value WHERE expert_id=$expert_id AND job_id=$job_id");

?>
