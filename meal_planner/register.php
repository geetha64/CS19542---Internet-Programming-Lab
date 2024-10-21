<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Planner - Register</title>
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

        /* Navbar */
        .navbar {
            height: 50px;
            background-color: #28a745;


        }

        .navbar-brand {
            font-family: Arial, sans-serif;
            font-size: 24px;
            font-weight: bold;
            color: black !important; /* Black color for Meal Planner */
            position: absolute;
            left: 50%;
            transform: translateX(-50%); /* Center Meal Planner */
        }

        .nav-link {
            color: white !important;
            font-size: 14px;
        }

        .navbar-nav .nav-link:hover {
            color: #ccc !important;
        }

        /* Content Layout */
        .content-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80vh; /* Full height for the layout */
            padding: 0 70px; /* Reduced padding to pull images slightly inward */
        }

        .slideshow-container {
            width: 65%; 
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px; /* Add margin to prevent touching the navbar */
        }

        .mySlides {
            display: none;
            width: 100%;
            height: auto;
        }

        .slideshow-image {
            width: 100%;
            height: auto; /* Maintain aspect ratio */
            border-radius: 20px; /* Add some rounded corners to images */
        }
        
        /* Register Box */
        .register-box {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            width: 300px; /* Previous smaller size */
            border-radius: 10px;
            margin: 0 10px; /* Pull inside the page */
        }

        /* Rights Box */
        .rights-box {
            text-align: center;
            font-size: 12px;
            color: gray;
            padding: 10px;
            position: absolute; /* Fixed position at bottom */
            bottom: 10px; /* Distance from the bottom */
            left: 50%; /* Center horizontally */
            transform: translateX(-50%); /* Center alignment */
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#">Meal Planner</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="getting_started.php">How to Use</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
        </ul>
    </div>
</nav>

<!-- Page content with slideshow and register box -->
<div class="content-wrapper">
    <!-- Slideshow -->
    <div class="slideshow-container">
        <div class="mySlides">
            <img src="food images/food1.jpg" alt="Food Image 1" class="slideshow-image">
        </div>
        <div class="mySlides">
            <img src="food images/food2.jpg" alt="Food Image 2" class="slideshow-image">
        </div>
        <div class="mySlides">
            <img src="food images\food3.jpg" alt="Food Image 3" class="slideshow-image">
        </div>
    </div>

    <!-- Register Box -->
    <div class="register-box">
        <h3>Register</h3>
        <form action="process_register.php" method="POST" onsubmit="return showSuccessMessage()">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-success btn-block">Register</button>
            <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</div>

<!-- Rights Box -->
<div class="rights-box">
    &copy; 2024 Meal Mate. All Rights Reserved.
</div>

<!-- Slideshow JavaScript -->
<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}
        slides[slideIndex - 1].style.display = "block";
        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }

    // Function to show a success message after registration
    function showSuccessMessage() {
        alert("Registered successfully!");
        return true; // Allows form submission to proceed
    }
</script>

</body>
</html>


