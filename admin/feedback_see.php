<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>
<?php
// Include the database connection file

// Initialize the database connection
$pdo = new Database();
$conn = $pdo->open();

try {
    // Fetch all feedback records from the database
    $sql = "SELECT * FROM feedback";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Fetch all feedback as an associative array
    $feedbacks = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$pdo->close();
?>

<div class="content-wrapper">
<section class="content">

    <h2>Feedback List</h2>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Message</th>

      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($feedbacks as $feedback): ?>
                    <tr>
                        <th scope="row"><?php echo htmlspecialchars($feedback['id']); ?></th>
                        <td><?php echo htmlspecialchars($feedback['name']); ?></td>
                        <td><?php echo htmlspecialchars($feedback['email']); ?></td>
                        <td><?php echo htmlspecialchars($feedback['message']); ?></td>
                        <td><?php echo htmlspecialchars($feedback['created_at']); ?></td>
                    </tr>
                <?php endforeach; ?>

  
   
  </tbody>
</table>
    
            </section>

            </div>
</body>
</html>
