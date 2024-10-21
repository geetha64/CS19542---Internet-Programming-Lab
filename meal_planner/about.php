<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planner - About Us</title>
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
        .about-box {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            width: 500px; /* Consistent box size */
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

<!-- About Us Content -->
<div class="about-box">
    <h1>About Us</h1>
    <p>Meal Planner is a revolutionary tool designed to help you plan and prepare your meals with ease. Our goal is to simplify meal planning while ensuring that you and your family enjoy balanced, healthy, and delicious meals.</p>
    <p><strong>Our Mission:</strong> To make meal planning stress-free and accessible to everyone.</p>
    <p><strong>Our Vision:</strong> A world where everyone enjoys the convenience of planned meals and healthier living.</p>
</div>

</body>
</html>
