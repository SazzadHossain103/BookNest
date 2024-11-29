<?php
// Start the session
session_start();

// Database connection settings
$servername = "localhost"; 
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "booknest"; // Your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the username and password from the form
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // SQL query to check if the user exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // If the user exists, verify the password
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify password using password_verify
        if (password_verify($input_password, $user['password'])) {
            // Password is correct, start a session and redirect
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header("Location: welcome.php");
            exit();
        } else {
            // Incorrect password
            $error_message = "Invalid username or password.";
        }
    } else {
        // User doesn't exist
        $error_message = "Invalid username or password.";
    }
}

// Close the connection
$conn->close();
?>

<!-- HTML Form (if login fails) -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial, sans-serif; }
        .login-container { max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        /* input[type="text"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; } */
        .button { width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; }
        .error { color: red; }
        .form-control{
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="login-container">
        <h2>Login</h2>
        <?php
        if (isset($error_message)) {
            echo "<p class='error'>$error_message</p>";
        }
        ?>
        <form action="login.php" method="POST">
            <label class="form-label" for="username">Username</label>
            <input class="form-control mb-3"type="text" id="username" name="username" required>
            <label class="form-label" for="password">Password</label>
            <input class="form-control mb-3" type="password" id="password" name="password" required>
            <button class="button" type="submit">Login</button>
        </form>
        <p class="mt-3" >You don't have an account? <a href="signup.php">Signup here</a></p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
