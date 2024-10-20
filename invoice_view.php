<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $invoice_id = $_GET['id'];

    // Fetch the invoice details
    $invoice_result = $conn->query("SELECT invoices.*, customers.name AS customer_name, customers.email, customers.phone FROM invoices JOIN customers ON invoices.customer_id = customers.id WHERE invoices.id = $invoice_id");
    
    $invoice = $invoice_result->fetch_assoc();

    // Fetch the items in the invoice
    $items_result = $conn->query("SELECT invoice_items.*, products.name AS product_name FROM invoice_items JOIN products ON invoice_items.product_id = products.id WHERE invoice_items.invoice_id = $invoice_id");
} else {
    die('Invoice ID not specified.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Invoice #<?php echo $invoice_id; ?></title>
</head>
<body>
    <div class="container">
        <h1>Invoice #<?php echo $invoice_id; ?></h1>
        
        <h2>Customer Details</h2>
        <p><strong>Name:</strong> <?php echo $invoice['customer_name']; ?></p>
        <p><strong>Email:</strong> <?php echo $invoice['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $invoice['phone']; ?></p>
        <p><strong>Date:</strong> <?php echo $invoice['created_at']; ?></p>
        
        <h2>Invoice Items</h2>
        <table>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Total Price</th>
            </tr>
            <?php while ($item = $items_result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $item['product_name']; ?></td>
                <td><?php echo $item['quantity']; ?></td>
                <td><?php echo $item['price']; ?></td>
                <td><?php echo $item['quantity'] * $item['price']; ?></td>
            </tr>
            <?php } ?>
        </table>

        <h2>Total Amount</h2>
        <p><strong>Total:</strong> $<?php echo $invoice['total']; ?></p>
        
        <a href="invoices.php">Back to Invoices</a>
    </div>
</body>
</html>
