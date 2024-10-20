<?php
include 'connection.php';

if (isset($_POST['add_product'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
    $conn->query($sql);
    header('Location: products.php');
}

$products = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Product Management</title>
</head>
<body>
    <div class="container">
        <h1>Product Management</h1>
        <form method="post" class="form">
            <input type="text" name="name" placeholder="Product Name" required>
            <input type="number" name="price" step="0.01" placeholder="Product Price" required>
            <button type="submit" name="add_product">Add Product</button>
        </form>

        <h2>Product List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
            <?php while ($row = $products->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
