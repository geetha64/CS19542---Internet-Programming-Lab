<?php
session_start();
$diet = $_POST['diet'] ?? '';
$groceryItems = []; // Initialize an array to hold grocery items
$selectedMealId = $_POST['meal_id'] ?? null; // Store selected meal ID for recipe fetching

// Database connection
$conn = new mysqli('localhost', 'root', '', 'meal_planner_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch meals based on the selected diet
$stmt = $conn->prepare("SELECT id, name FROM meals2 WHERE diet = ?");
$stmt->bind_param('s', $diet);
$stmt->execute();
$result = $stmt->get_result();

// Check if a meal has been selected to fetch grocery items
if ($selectedMealId) {
    // Fetch grocery items for the selected meal
    $stmt = $conn->prepare("SELECT item_name, quantity FROM grocery_items WHERE meal_id = ?");
    $stmt->bind_param('i', $selectedMealId);
    $stmt->execute();
    $groceryResult = $stmt->get_result();

    while ($grocery = $groceryResult->fetch_assoc()) {
        $groceryItems[] = $grocery; // Populate grocery items array
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Selection</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/background.jpg'); /* Set your desired background image */
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .navbar {
            height: 60px; /* Adjust navbar height */
            background-color: #28a745; /* Light green */
        }
        
        .meal-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 600px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin: auto; /* Center the meal box */
            margin-top: 20px; /* Add margin for spacing */
        }
        
        h2 {
            color: #28a745;
        }

        .btn {
            margin-top: 20px;
            width: 100%;
        }

        .meal-list {
            margin-right: 20px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .meal-item {
            cursor: pointer;
            padding: 10px;
            margin: 5px 0;
            background-color: #e9ecef;
            border-radius: 5px;
            width: 100%;
            text-align: left;
        }

        .meal-item:hover {
            background-color: #28a745;
            color: white;
        }

        .grocery-list {
            margin-left: 20px;
            width: 250px;
        }

        .grocery-item {
            padding: 10px;
            margin: 5px 0;
            background-color: #e9ecef;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php" style="color: white;">Meal Planner</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php" style="color: white;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php" style="color: white;">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php" style="color: white;">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php" style="color: white;">Logout</a>
                </li>
                <li class="nav-item">
                    <?php if (isset($_SESSION['username'])): ?>
                        <span class="navbar-text" style="color: white;">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</span>
                    <?php endif; ?>
                </li>
            </ul>
        </div>
    </nav>

    <div class="meal-box">
        <div class="meal-list">
            <h2>Select Your Meal</h2>
            <form action="meal_selection.php" method="POST">
                <div class="form-group">
                    <label for="diet">Choose a Diet Preference:</label>
                    <select class="form-control" id="diet" name="diet" required>
                        <option value="low_carb" <?php echo ($diet == 'low_carb') ? 'selected' : ''; ?>>Low Carb</option>
                        <option value="high_protein" <?php echo ($diet == 'high_protein') ? 'selected' : ''; ?>>High Protein</option>
                        <option value="vegan" <?php echo ($diet == 'vegan') ? 'selected' : ''; ?>>Vegan</option>
                        <option value="vegetarian" <?php echo ($diet == 'vegetarian') ? 'selected' : ''; ?>>Vegetarian</option>
                        <option value="gluten_free" <?php echo ($diet == 'gluten_free') ? 'selected' : ''; ?>>Gluten-Free</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>

            <?php if ($result->num_rows > 0): ?>
                <h4 class="mt-3">Meals:</h4>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="diet" value="<?php echo htmlspecialchars($diet); ?>">
                        <input type="hidden" name="meal_id" value="<?php echo $row['id']; ?>">
                        <div class="meal-item" onclick="this.closest('form').submit()">
                            <?php echo htmlspecialchars($row['name']); ?>
                        </div>
                    </form>
                <?php endwhile; ?>
            <?php else: ?>
                <div class="alert alert-warning mt-3">No meals found for this diet option.</div>
            <?php endif; ?>
        </div>

        <div class="grocery-list">
            <h4>Grocery List:</h4>
            <ul class="list-group">
                <?php if (!empty($groceryItems)): ?>
                    <?php foreach ($groceryItems as $grocery): ?>
                        <li class="grocery-item"><?php echo htmlspecialchars($grocery['item_name']) . " - " . htmlspecialchars($grocery['quantity']); ?></li>
                    <?php endforeach; ?>
                <?php else: ?>
                    <li class="grocery-item">No grocery items found.</li>
                <?php endif; ?>
            </ul>

            <?php if ($selectedMealId): ?>
                <form action="recipe.php" method="POST">
                    <input type="hidden" name="meal_id" value="<?php echo $selectedMealId; ?>">
                    <button type="submit" class="btn btn-primary mt-3">View Recipe</button>
                </form>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>

