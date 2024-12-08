<?php

session_start(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name=$_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $job=$_POST['job'];
    $details=$_POST['details'];
    $dateB=$_POST['birthday'];


    if ($password === $confirm_password) {
  
        $_SESSION['users'][] = [
            'name'=>$name,
            'email' => $email,
            'password' => $password, 
            'job'=> $job,
            'details'=>$details,
            'dateB'=>$dateB,
       
        ];

  
        header("Location: ../login.php");
        exit;
    } else {
        $error = "Passwords do not match!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
<h2>Registration</h2>
<?php if (isset($_GET['error'])): ?>
    <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
<?php endif; ?>
<?php if (isset($error)): ?>
    <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
<?php endif; ?>
<form method="POST" action="">
<label for="name">Full Name: <span style="color: red;">*</span></label>
<input type="text" name="name" id="name" required><br><br>

    <label for="email">Email: <span style="color: red;">*</span></label>
    <input type="email" name="email" id="email" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password" required><br><br>

    <label for="dateB">Date of Birth:</label>
<input type="date" id="dateB" name="dateB" ID="dateB" required>
<br>
<br>
Profession:
<input type="radio" name="job" id="teacher" value="teacher">
<label for="teacher">Teacher</label>
<input type="radio" name="job" id="student" value="student">
<label for="student">Student</label>
<br>
<br>
Details:
<textarea name="details"id="details" rows="5" cols="40"></textarea>
<br><br>
    <button type="submit">Register</button>
</form>
</body>
</html>
