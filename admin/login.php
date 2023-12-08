<?php
session_start();

// Assuming you have a function to check login credentials
// Replace this with your actual authentication logic
function authenticate($username, $password) {
    // Your authentication logic here
    // Return true if authentication is successful, otherwise false
    return ($username === 'admin' && $password === 'password');
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    if (authenticate($username, $password)) {
        // Set session variable to mark user as logged in
        $_SESSION['admin_logged_in'] = true;

        // Redirect to the admin dashboard
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body class="text-center">

    <form class="form-signin" action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $error ?>
            </div>
        <?php endif; ?>

        <label for="username" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>

        <label for="password" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
