<?php 
include 'config.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Safety casting

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM buyers WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        // Redirect properly
        header("Location: view_buyers.php");
        exit();
    } else {
        echo "Error deleting buyer: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid request!";
}

$conn->close();
?>
