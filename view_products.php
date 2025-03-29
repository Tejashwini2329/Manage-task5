<?php
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        th {
            background: #28a745;
            color: white;
        }

        tr:nth-child(even) {
            background: #f2f2f2;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .delete-btn:hover {
            background: #c82333;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>View Products</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>

            <?php
            $result = $conn->query("SELECT * FROM products");
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['category']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['quantity']}</td>
                        <td><a class='delete-btn' href='delete_product.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this product?\")'>Delete</a></td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No products found!</td></tr>";
            }
            ?>
        </table>
        <a href="add_product.php">Add Product</a>
    </div>

</body>

</html>
