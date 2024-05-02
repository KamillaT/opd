<?php
// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected value and text from the POST data
    $selectedValue = $_POST['value'];
    $username = $_POST['id'];
    // $selectedText = $_POST['text'];

    $conn = new mysqli("localhost", "root", "", "users");
    $conn->query("UPDATE user_data SET state = '$selectedValue' WHERE username = '$username'");
    // Update the database with the selected value
    // Replace this with your actual database update logic
    // For demonstration purposes, we will just return the selected value and text
    $updatedData = [
        'value' => $selectedValue,
        // 'text' => $selectedText
    ];

    // Return the updated data as JSON response
    header('Content-Type: application/json');
    echo json_encode($updatedData);
}
?>
