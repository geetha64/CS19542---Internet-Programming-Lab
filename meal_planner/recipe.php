<?php
session_start();
$meal_id = $_POST['meal_id'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'meal_planner_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the recipe for the selected meal
$stmt = $conn->prepare("SELECT recipe FROM recipes WHERE meal_id = ?");
$stmt->bind_param('i', $meal_id);
$stmt->execute();
$result = $stmt->get_result();
$recipe = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipe for Meal ID: <?php echo htmlspecialchars($meal_id); ?></title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('getting started/background.jpg'); /* Set the background image */
            background-size: cover; /* Cover the entire background */
            background-position: fill; /* Center the background image */
            color: white; /* Change text color to white for better contrast */
            padding: 20px;
        }
        .content {
            background-color: rgba(0, 0, 0, 0.7); /* Add a semi-transparent background to content */
            padding: 30px; /* Increased padding for more space */
            border-radius: 10px;
            font-size: 20px; /* Increased font size */
        }
        .footer {
            margin-top: 20px;
        }
    
    </style>
</head>
<body>
<div class="content">
   
    <div class="container">
        <h2 class="mt-5">Recipes<?php echo htmlspecialchars($meal_id); ?></h2>
        <p>
            <?php echo htmlspecialchars($recipe['recipe']); ?>
        </p>
        <a href="meal_selection.php" class="btn btn-secondary mt-3">Back to Meal Selection</a>
    </div> 
   </div>

</body>
</html>
