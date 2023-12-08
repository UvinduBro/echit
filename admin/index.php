<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Assuming you have a function to fetch responses from the database
// Replace this with your actual database retrieval logic
function getResponsesFromDatabase() {
    // Your database connection logic here

    // Example query (replace with your actual query)
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $responses[] = $row;
        }
    }

    // Your database close connection logic here

    return $responses;
}

$responses = getResponsesFromDatabase();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <div class="navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <?php foreach ($responses as $response) : ?>
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Message</h5>
                            <p class="card-text"><?= $response['message'] ?></p>
                            <p class="card-text"><small class="text-muted">Sent on <?= $response['send_date'] ?></small></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
