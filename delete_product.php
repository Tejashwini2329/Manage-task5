<?php
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);  // Always sanitize input

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect to the correct page
        header("Location: view_products.php");  // Fixed the file name
        exit();
    } else {
        echo "Error deleting product: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request!";
}

$conn->close();
?>
