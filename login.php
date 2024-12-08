<?php
// login.php
session_start(); // Start session to access stored user data

// If already logged in, redirect to profile
if (isset($_SESSION['current_user'])) {
    header("Location: control/profile.php");
    exit;
}

// Process the login form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } else {
        // Check if user exists in session data
        if (isset($_SESSION['users'])) {
            foreach ($_SESSION['users'] as $user) {
                if ($user['email'] === $email && $user['password'] === $password) {
                    // Set the current user session
                    $_SESSION['current_user'] = $user;
                    header("Location: control/profile.php"); // Redirect to profile page
                    exit;
                }
            }
        }

        $error = "Invalid email or password. Please register.";
        header("Location: control/registration.php?error=" . urlencode($error));
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>
<form method="POST" action="">
    <label for="email">Email: <span style="color: red;">*</span></label>
    <input type="email" name="email" id="email" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>
