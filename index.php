<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Billing System Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Billing System Dashboard</h1>
        <div class="dashboard">
            <div class="dashboard-item">
                <h2>Customers</h2>
                <p>Manage customer information.</p>
                <a href="customers.php" class="btn">Manage Customers</a>
            </div>

            <div class="dashboard-item">
                <h2>Products</h2>
                <p>Manage products and pricing.</p>
                <a href="products.php" class="btn">Manage Products</a>
            </div>

            <div class="dashboard-item">
                <h2>Create Invoice</h2>
                <p>Create a new invoice for a customer.</p>
                <a href="create_invoice.php" class="btn">Create Invoice</a>
            </div>

            <div class="dashboard-item">
                <h2>Invoices</h2>
                <p>View and manage invoices.</p>
                <a href="invoices.php" class="btn">View Invoices</a>
            </div>
        </div>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 700px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        .dashboard {
            display: grid;
            grid-template-columns: auto auto;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: space-between;
        }

        .dashboard-item {
            background-color: #0bbf35;
            color: white;
            padding: 20px;
            border-radius: 10px;
            width: 60%;
            /* box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); */
        }

        .dashboard-item h2 {
            margin-top: 0;
        }

        .dashboard-item p {
            margin-bottom: 20px;
        }

        .btn {
            text-decoration: none;
            color: #479e37;
            background-color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            font-weight: 800%;
        }

        .btn:hover {
            background-color: #0732f0;
        }
    </style>
</body>
</html>
