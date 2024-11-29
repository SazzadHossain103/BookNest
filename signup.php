<?php
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
    // Get the input values
    $input_username = trim($_POST['username']);
    $input_email = trim($_POST['email']);
    $input_password = $_POST['password'];

    // Validate input (basic validation)
    if (empty($input_username) || empty($input_email) || empty($input_password)) {
        header("Location: signup.php?error=All fields are required.");
        exit();
    }

    // Check if the username already exists
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username already exists
        header("Location: signup.php?error=Username is already taken.");
        exit();
    }

    // Check if the email already exists
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $input_email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists
        header("Location: signup.php?error=Email is already registered.");
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($input_password, PASSWORD_DEFAULT);

    // Insert the new user into the database
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $input_username, $input_email, $hashed_password);
    
    if ($stmt->execute()) {
        // Redirect to login page on success
        header("Location: login.php?success=Account created successfully! Please log in.");
        exit();
    } else {
        // Error inserting user into the database
        header("Location: signup.php?error=Error creating account.");
        exit();
    }
}

// Close the connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <style>
        body { font-family: Arial, sans-serif; }
        .signup-container { max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        /* input[type="text"], input[type="email"], input[type="password"] { width: 100%; padding: 10px; margin: 10px 0; } */
        .btn-signup { width: 100%; padding: 10px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; }
        .error { color: red; }
        .form-control{
            padding: 10px;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="signup-container">
        <h2>Create an Account</h2>
        <form action="signup.php" method="POST">
            <label class="form-label" for="username">Username</label>
            <input class="form-control mb-3" type="text" id="username" name="username" required>
            
            <label class="form-label" for="email">Email</label>
            <input class="form-control mb-3" type="email" id="email" name="email" required>
            
            <label class="form-label" for="password">Password</label>
            <input class="form-control mb-3" type="password" id="password" name="password" required>
            
            <button class="btn-signup" type="submit">Sign Up</button>
        </form>

        <p class="mt-3" >Already have an account? <a href="login.php">Login here</a></p>

        <!-- Error message -->
        <?php
        if (isset($_GET['error'])) {
            echo "<p class='error'>" . htmlspecialchars($_GET['error']) . "</p>";
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>