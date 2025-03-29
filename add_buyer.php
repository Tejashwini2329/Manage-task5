<?php
include 'config.php';

$msg = ""; // Message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);

    // Basic Validation
    if (empty($name) || empty($email) || empty($phone)) {
        $msg = "<p style='color:red;'>All fields except address are required.</p>";
    } else {
        // Insert Query
        $sql = "INSERT INTO buyers (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";
        if (mysqli_query($conn, $sql)) {
            $msg = "<p style='color:green;'>Buyer added successfully!</p>";
            // Optional: redirect after 2 seconds
            header("refresh:2;url=view_buyers.php");
        } else {
            $msg = "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Buyer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://source.unsplash.com/1600x900/?shopping,people') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 40%;
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
        input[type="text"],
        input[type="email"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            background: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #b66549;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #28a745;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Add Buyer</h2>
        <!-- Success / Error Message -->
        <?php echo $msg; ?>
        
        <form action="add_buyer.php" method="POST">
            <label for="name">Buyer Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="number" id="phone" name="phone" required>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4"></textarea>

            <button type="submit">Add Buyer</button>
        </form>
        <a href="view_buyers.php">View Buyers</a>
    </div>

</body>

</html>
