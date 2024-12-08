<?php

session_start();


if (!isset($_SESSION['current_user'])) {
    header("Location: ../login.php");
    exit;
}

$user = $_SESSION['current_user']; 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
</head>
<body>
<h2>Profile</h2>
<p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
<p><strong>Date of Birth:</strong> <?php echo htmlspecialchars($user['dateB']); ?></p>
<p><strong>Profession:</strong> <?php echo htmlspecialchars($user['job']); ?></p>
<p><strong>Details :</strong> <?php echo htmlspecialchars($user['details']); ?></p>

<a href="logout.php">Logout</a>
</body>
</html>
