<?php
$host = getenv('DB_HOST');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$db_name = getenv('DB_NAME');

// Establishing connection to MySQL
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize the user input to prevent SQL injection
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Get the current date and time
    $sendDate = date("Y-m-d H:i:s");

    // Inserting data into the database with the send date
    $sql = "INSERT INTO users (message, send_date) VALUES ('$message', '$sendDate')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to another page after successful registration
        header("Location: /waiting");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
