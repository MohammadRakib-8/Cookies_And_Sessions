<?php

session_start(); // Start session to access session variables

// Remove the current user session
unset($_SESSION['current_user']);

// Redirect to login page
header("Location: ../login.php");
exit;
?>
