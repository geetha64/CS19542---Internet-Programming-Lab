<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planner - Contact Us</title>
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
            width: 900px; /* Consistent box size */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Add shadow for depth */
            margin: auto; /* Center horizontally */
            margin-top: 60px; /* Space from top */
        }

        
    </style>
</head>
<body>

<!-- Navbar -->
<?php include 'navbar.php'; ?>

<!-- Contact Us Content -->
<div class="about-box">
    <h1>Contact Us</h1>
    <p>If you have any questions, feedback, or suggestions, feel free to reach out to us using the form below:</p>
    
    <form action="process_contact.php" method="POST">
        <div class="form-group">
            <label for="name">Your Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Your Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>
