<?php
// Include the database connection file
include 'includes/conn.php';

// Initialize the database connection
$pdo = new Database();
$conn = $pdo->open();

try {
    // Prepare the SQL query
    $sql = "INSERT INTO feedback (name, email, message) VALUES (:name, :email, :message)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':message', $_POST['message']);

    // Execute the statement
    $stmt->execute();

    echo "Feedback submitted successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo->close();
?>
