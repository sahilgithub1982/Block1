<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $new_name = $_POST['new_name'];
    $new_email = $_POST['new_email'];
    $new_phone = $_POST['new_phone'];
    $new_address = $_POST['new_address'];

    $query = "UPDATE customers SET name = ?, email = ?, phone = ?, address = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $new_name, $new_email, $new_phone, $new_address, $customer_id);

    if ($stmt->execute()) {
        echo "<script>
            alert('Customer updated successfully');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Error updating customer');
            window.location.href = 'index.php';
        </script>";
    }

    $stmt->close();
}
$conn->close();
?>
