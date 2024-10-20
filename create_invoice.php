<?php
include 'connection.php';

$customers = $conn->query("SELECT * FROM customers");
$products = $conn->query("SELECT * FROM products");

if (isset($_POST['create_invoice'])) {
    $customer_id = $_POST['customer_id'];
    $total = $_POST['total'];

    $conn->query("INSERT INTO invoices (customer_id, total) VALUES ('$customer_id', '$total')");
    $invoice_id = $conn->insert_id;

    foreach ($_POST['product_ids'] as $key => $product_id) {
        $quantity = $_POST['quantities'][$key];
        $price = $_POST['prices'][$key];
        $conn->query("INSERT INTO invoice_items (invoice_id, product_id, quantity, price)
                      VALUES ('$invoice_id', '$product_id', '$quantity', '$price')");
    }

    header('Location: invoices.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Create Invoice</title>
</head>
<body>
    <div class="container">
        <h1>Create Invoice</h1>
        <form method="post">
            <label for="customer">Select Customer:</label>
            <select name="customer_id">
                <?php while ($row = $customers->fetch_assoc()) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>

            <div id="product-section">
                <h2>Add Products</h2>
                <div class="product">
                    <select name="product_ids[]">
                        <?php while ($row = $products->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                    </select>
                    <input type="number" name="quantities[]" placeholder="Quantity" required>
                    <input type="number" step="0.01" name="prices[]" placeholder="Price" required>
                </div>
            </div>
            <button type="button" onclick="addProduct()">Add Another Product</button>

            <input type="number" step="0.01" name="total" placeholder="Total" required>
            <button type="submit" name="create_invoice">Create Invoice</button>
        </form>

        <script>
            function addProduct() {
                var productSection = document.getElementById('product-section');
                var div = document.createElement('div');
                div.classList.add('product');
                div.innerHTML = document.querySelector('.product').innerHTML;
                productSection.appendChild(div);
            }
        </script>
    </div>
</body>
</html>
