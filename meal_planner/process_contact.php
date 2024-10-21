<?php
// Database connection details
$host = 'localhost'; // Your database host
$dbname = 'meal_planner_db'; // Your database name
$username = 'root'; // Your database username
$password = ''; // Your database password (usually empty in XAMPP)

// Create a connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize form inputs
    $name = $conn->real_escape_string(htmlspecialchars($_POST['name']));
    $email = $conn->real_escape_string(htmlspecialchars($_POST['email']));
    $message = $conn->real_escape_string(htmlspecialchars($_POST['message']));

    // Insert the message into the database
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirect with success message
        echo "<script>alert('Your message has been sent successfully!'); window.location.href = 'contact.php';</script>";
    } else {
        // Redirect with error message
        echo "<script>alert('Failed to save your message. Please try again later.'); window.location.href = 'contact.php';</script>";
    }
}

// Close the database connection
$conn->close();
?>


