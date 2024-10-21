<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/background.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column; /* Allow for vertical stacking of elements */
        }
        
        .login-box {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            width: 300px; /* Consistent box size */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add shadow for depth */
            margin: auto; /* Center horizontally */
            margin-top: 100px; /* Space from top */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <!-- Login Box -->
    <div class="login-box">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
    </div>

    <?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $conn = new mysqli('localhost', 'root', '', 'meal_planner_db', 3306);



        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $id;
                echo "<div class='alert alert-success mt-3'>Login successful! <a href='meal_selection.php'>Go to Meal Planner</a></div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Invalid password!</div>";
            }
        } else {
            echo "<div class='alert alert-danger mt-3'>No user found with that username!</div>";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>