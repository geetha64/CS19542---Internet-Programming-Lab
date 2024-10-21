<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planner- Home</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
            background-image: url('images/background.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .home-box {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            width: 600px; /* Consistent box size */
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


<!-- Home Content -->
<div class="home-box">
    <h1>Welcome to Meal Planner </h1>
    <p>Your personal guide to planning healthy and delicious meals!</p>
    <p><strong>Why Meal Mate?</strong></p>
    <ul class="list-unstyled">
        <li>- Simplify your meal prep</li>
        <li>- Get tailored meal plans</li>
        <li>- Keep track of your groceries</li>
        <li>- Discover new recipes every week</li>
        <li>- Maintain a balanced diet easily</li>
        <li>- Reduce food waste with smart planning</li>
    </ul>
    <p class="mt-4">Join our community and take the hassle out of meal planning!</p>
    <a href="register.php" class="btn btn-success">Get Started</a>
</div>

</body>
</html>

