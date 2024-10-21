<?php
// Start session
session_start();

// Database connection
$conn = new mysqli('localhost', 'root', '', 'meal_planner_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get and sanitize input data
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $confirm_password = $conn->real_escape_string($_POST['confirm_password']);
    
    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match!'); window.location.href = 'register.php';</script>";
        exit();
    }
    
    // Check if email already exists
    $check_email_sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_email_sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        echo "<script>alert('Email already exists!'); window.location.href = 'register.php';</script>";
        exit();
    }
    
    // Hash the password before saving to the database
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    
    // Insert data into users table
    $insert_sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($insert_sql);
    $stmt->bind_param('sss', $username, $email, $hashed_password);
    
    if ($stmt->execute()) {
        // Registration successful, redirect to login page
        echo "<script>alert('Registration successful! Please log in.'); window.location.href = 'login.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
