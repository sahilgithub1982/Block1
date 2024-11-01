<?php
session_start();

include 'db_config.php';

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Prepare SQL query to check if the entered credentials match any row in the database
    $sql = "SELECT * FROM login WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $input_username, $input_password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a matching row was found
    if ($result->num_rows > 0) {
        // If match is found, display alert with "yes"
        echo "<script>window.location.href='index.php';</script>";
    } else {
        // Optional: display an alert if credentials don't match
        echo "<script>alert('Invalid username or password'); window.location.href='index.html';</script>";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
