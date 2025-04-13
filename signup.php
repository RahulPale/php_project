<?php
$conn = new mysqli('localhost', 'root', '', 'starbucks_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$errors = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Hash the password

    $check_email = $conn->query("SELECT * FROM users WHERE email = '$email'");
    if ($check_email->num_rows > 0) {
        $errors = "Email already registered.";
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            header('Location: login.php');
            exit();
        } else {
            $errors = "Error: " . $conn->error;
        }
    }
}
?>
<<<<<<< HEAD
 
<!DOCTYPE html>
<html lang="en">
<head>

=======

<!DOCTYPE html>
<html lang="en">
<head>
>>>>>>> 5e43a1b271ae71da4749a9743e122999d2d04ca2
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('/img/hp.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            width: 400px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            width: 100%;
            padding: 12px;
            background-color: #808080;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #333;
        }
        a {
            color: #2E8B57;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        p {
            text-align: center;
            margin-top: 10px;
        }
        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="signup.php" method="POST">
        <h2>Signup</h2>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Signup</button>
        <?php if ($errors) echo "<p class='error-message'>$errors</p>"; ?>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>
