<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];
    $new_order_details = $_POST['new_order_details'];
    $new_order_total = $_POST['new_order_total'];

    $query = "UPDATE orders SET order_details = ?, order_total = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sdi", $new_order_details, $new_order_total, $order_id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Order updated successfully');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Error updating order');
            window.location.href = 'index.php';
        </script>";
    }

    $stmt->close();
}
$conn->close();
?>
