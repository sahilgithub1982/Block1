<?php
include 'db_config.php';

$productQuery = "SELECT id, name FROM products";
$productResult = $conn->query($productQuery);

$customerQuery = "SELECT id, name FROM customers";
$customerResult = $conn->query($customerQuery);

$orderQuery = "SELECT id, customer_id FROM orders";
$orderResult = $conn->query($orderQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>92 Doner Kings Management System</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <header>
        <span>92 Doner Kings Management System</span>
        <button class="btn btn-lg btn-primary" onclick="window.location.href='index.html';">Logout</button>
    </header> 

    <main>
        <div class="main-sections">
            <!-- Add Stock Section -->
            <div id="a"><h1>Add Stock</h1></div>
            <section id="aa">
                <h2>Add Stock</h2>
                <form action="add_product.php" method="post">
                    <label for="name">Product Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" required>
                    
                    <label for="price">Price:</label>
                    <input type="number" step="0.01" id="price" name="price" required>
                    
                    <button class="btn-warning" type="submit">Add Product</button> 
                    <button id="aaa">Close</button>
                </form>
            </section>

            <!-- Update Stock Section -->
            <div id="g"><h1>Update Stock</h1></div>
            <section id="gg">
                <h2>Update Stock</h2>
                <form action="update_stock.php" method="post">
                    <label for="product_id">Select Product ID:</label>
                    <select name="product_id" id="product_id" required>
                        <option value="">Select a product</option>
                        <?php while ($row = $productResult->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['id'] . " - " . $row['name'] . "</option>";
                        } ?>
                    </select>
                    
                    <label for="new_quantity">New Quantity:</label>
                    <input type="number" id="new_quantity" name="new_quantity" required>
                    
                    <label for="new_price">New Price:</label>
                    <input type="number" step="0.01" id="new_price" name="new_price" required>
                    
                    <button class="btn-warning" type="submit">Update Stock</button>
                    <button id="ggg">Close</button>
                </form>
            </section>

            <!-- Add Customer Section -->
            <div id="b"><h1>Add Customers</h1></div>
            <section id="bb">
                <h2>Add Customers</h2>
                <form action="add_customer.php" method="post">
                    <label for="customer_name">Customer Name:</label>
                    <input type="text" id="customer_name" name="name" required>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone">
                    
                    <label for="address">Address:</label>
                    <textarea id="address" name="address"></textarea>
                    
                    <button class="btn-warning" type="submit">Add Customer</button>
                    <button id="bbb">Close</button>
                </form>
            </section>

            <!-- Update Customer Section -->
            <div id="h"><h1>Update Customers</h1></div>
            <section id="hh">
                <h2>Update Customers</h2>
                <form action="update_customer.php" method="post">
                    <label for="customer_id">Select Customer ID:</label>
                    <select name="customer_id" id="customer_id" required>
                        <option value="">Select a customer</option>
                        <?php while ($row = $customerResult->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['id'] . " - " . $row['name'] . "</option>";
                        } ?>
                    </select>
                    
                    <label for="new_name">New Name:</label>
                    <input type="text" id="new_name" name="new_name">
                    
                    <label for="new_email">New Email:</label>
                    <input type="email" id="new_email" name="new_email">
                    
                    <label for="new_phone">New Phone:</label>
                    <input type="text" id="new_phone" name="new_phone">
                    
                    <label for="new_address">New Address:</label>
                    <textarea id="new_address" name="new_address"></textarea>
                    
                    <button class="btn-warning" type="submit">Update Customer</button>
                    <button id="hhh">Close</button>
                </form>
            </section>

            <!-- Add Orders Section -->
            <div id="c"><h1>Add Orders</h1></div>
            <section id="cc">
                <h2>Add Orders</h2>
                <form action="add_order.php" method="post">
                    <label for="customer_id">Customer ID:</label>
                    <input type="number" id="customer_id" name="customer_id" required>
                    
                    <label for="order_details">Order Details:</label>
                    <textarea id="order_details" name="order_details" required></textarea>
                    
                    <label for="order_total">Order Total:</label>
                    <input type="number" step="0.01" id="order_total" name="order_total" required>
                    
                    <button class="btn-warning" type="submit">Add Order</button>
                    <button id="ccc">Close</button>
                </form>
            </section>

            <!-- Update Orders Section -->
            <div id="i"><h1>Update Orders</h1></div>
            <section id="ii">
                <h2>Update Orders</h2>
                <form action="update_order.php" method="post">
                    <label for="order_id">Select Order ID:</label>
                    <select name="order_id" id="order_id" required>
                        <option value="">Select an order</option>
                        <?php while ($row = $orderResult->fetch_assoc()) {
                            echo "<option value='" . $row['id'] . "'>" . $row['id'] . " - Customer ID: " . $row['customer_id'] . "</option>";
                        } ?>
                    </select>
                    
                    <label for="new_order_details">New Order Details:</label>
                    <textarea id="new_order_details" name="new_order_details"></textarea>
                    
                    <label for="new_order_total">New Order Total:</label>
                    <input type="number" step="0.01" id="new_order_total" name="new_order_total">
                    
                    <button class="btn-warning" type="submit">Update Order</button>
                    <button id="iii">Close</button>
                </form>
            </section>
        </div>
         <!-- Product Inventory Table -->
         <div id="d"><h1>Display Inventory</h1></div>
        <section id="dd" aria-labelledby="product-list">
            <h2 id="product-list">Product Inventory</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Last Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'display_products.php'; ?>
                </tbody>
            </table>
            <button class="btn btn-lg btn-danger" id="ddd">Close</button>

        </section>

        <!-- Customer List Table -->
        <div id="e"><h1>Display Customers</h1></div>
        <section id="ee" aria-labelledby="customer-list">
            <h2 id="customer-list">Customer List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Customer ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'display_customers.php'; ?>
                </tbody>
            </table>
            <button class="btn btn-lg btn-danger" id="eee">Close</button>

        </section>

        <!-- Order List Table -->
        <div id="f"><h1>Display Orders</h1></div>
        <section id="ff" aria-labelledby="order-list">
            <h2 id="order-list">Order List</h2>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Order Details</th>
                        <th>Total</th>
                        <th>Order Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'display_orders.php'; ?>
                </tbody>
            </table>
            <button class="btn btn-lg btn-danger" id="fff">Close</button>

        </section>
    </main>

<script>
$(document).ready(function() {
    $('#a').click(function() { $('#aa').slideDown(); $('#a').hide(); });
    $('#aaa').click(function() { $('#a').show(); $('#aa').hide(); });

    $('#b').click(function() { $('#bb').slideDown(); $('#b').hide(); });
    $('#bbb').click(function() { $('#b').show(); $('#bb').hide(); });

    $('#c').click(function() { $('#cc').slideDown(); $('#c').hide(); });
    $('#ccc').click(function() { $('#c').show(); $('#cc').hide(); });

    $('#d').click(function() { $('#dd').slideDown(); $('#d').hide(); });
    $('#ddd').click(function() { $('#d').show(); $('#dd').hide(); });

    $('#e').click(function() { $('#ee').slideDown(); $('#e').hide(); });
    $('#eee').click(function() { $('#e').show(); $('#ee').hide(); });

    $('#f').click(function() { $('#ff').slideDown(); $('#f').hide(); });
    $('#fff').click(function() { $('#f').show(); $('#ff').hide(); });

    $('#g').click(function() { $('#gg').slideDown(); $('#g').hide(); });
    $('#ggg').click(function() { $('#g').show(); $('#gg').hide(); });

    $('#h').click(function() { $('#hh').slideDown(); $('#h').hide(); });
    $('#hhh').click(function() { $('#h').show(); $('#hh').hide(); });

    $('#i').click(function() { $('#ii').slideDown(); $('#i').hide(); });
    $('#iii').click(function() { $('#i').show(); $('#ii').hide(); });
});
</script>
</body>
</html>

