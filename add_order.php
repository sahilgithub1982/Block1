<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $order_details = $_POST['order_details'];
    $order_total = $_POST['order_total'];

    $sql = "INSERT INTO orders (customer_id, order_details, order_total) VALUES ('$customer_id', '$order_details', '$order_total')";

    if ($conn->query($sql) === TRUE) {
        echo "Order added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
header("Location: index.php");
?>
