<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $new_quantity = $_POST['new_quantity'];
    $new_price = $_POST['new_price'];

    $query = "UPDATE products SET quantity = ?, price = ?, last_updated = NOW() WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("dii", $new_quantity, $new_price, $product_id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Product stock updated successfully');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Error updating product stock');
            window.location.href = 'index.php';
        </script>";
    }

    $stmt->close();
}
$conn->close();
?>
