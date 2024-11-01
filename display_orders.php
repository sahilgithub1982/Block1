<?php
include 'db_config.php';

$sql = "SELECT * FROM orders";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['customer_id']}</td>
                <td>{$row['order_details']}</td>
                <td>{$row['order_total']}</td>
                <td>{$row['order_date']}</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No orders found.</td></tr>";
}
$conn->close();
?>
