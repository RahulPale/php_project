<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admin_user = $_POST['username'];
    $admin_pass = $_POST['password'];

    // Hard-coded admin credentials for this example
    if ($admin_user === 'admin' && $admin_pass === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin-orders.php");
        exit();
    } else {
        echo "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

<h1>Admin Login</h1>
<form method="POST" action="">
    Username: <input type="text" name="username"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>

</body>
</html>
