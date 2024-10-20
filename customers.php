<?php
include 'connection.php';

if (isset($_POST['add_customer'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO customers (name, email, phone) VALUES ('$name', '$email', '$phone')";
    $conn->query($sql);
    header('Location: customers.php');
}

$customers = $conn->query("SELECT * FROM customers");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Customer Management</title>
</head>
<body>
    <div class="container">
        <h1>Customer Management</h1>
        <form method="post" class="form" autocomplete="off">
            <input type="text" name="name" placeholder="Customer Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="number" name="phone" placeholder="Phone" required>
            <button type="submit" name="add_customer">Add Customer</button>
        </form>

        <h2>Customer List</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
            <?php while ($row = $customers->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>
