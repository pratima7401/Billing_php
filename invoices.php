<?php
include 'connection.php';

$invoices = $conn->query("SELECT invoices.*, customers.name AS customer_name FROM invoices JOIN customers ON invoices.customer_id = customers.id");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Invoices</title>
</head>
<body>
    <div class="container">
        <h1>Invoices</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $invoices->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['customer_name']; ?></td>
                <td><?php echo $row['total']; ?></td>
                <td><?php echo $row['created_at']; ?></td>
                <td><a href="invoice_view.php?id=<?php echo $row['id']; ?>">View</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
