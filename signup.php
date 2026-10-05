<?php 
require_once "database.php"; 
// Backend validation  
if ($_SERVER["REQUEST_METHOD"] === "POST") { 
    $first_name = trim($_POST["first_name"]); 
    $last_name = trim($_POST["last_name"]); 
    $username = trim($_POST["username"]); 
    $email = trim($_POST["email"]); 
    $password = $_POST["password"]; 
    $age = $_POST["age"]; 
    $address = trim($_POST["address"]); 
    $errors = []; 
    // Check if inputs are empty (except address)
    if (
        empty($first_name) || 
        empty($last_name) || 
        empty($username) || 
        empty($email) || 
        empty($password) || 
        empty($age)
    ) { 
        $errors[] = "Please fill in all required fields."; 
    } 
    // Username cannot contain spaces
    if (preg_match("/\s/", $username)) { 
        $errors[] = "Username cannot contain spaces."; 
    } 
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { 
        $errors[] = "Please enter a valid email."; 
    } 
    // Password must be more than 6 characters
    if (strlen($password) <= 6) { 
        $errors[] = "Password must be more than 6 characters."; 
    } 
    // Check whether username or email already exists
    if (empty($errors)) { 
        $sql = "SELECT id FROM users 
                WHERE username = :username OR email = :email"; 
        $stmt = $pdo->prepare($sql); 
        $stmt->execute([ 
            "username" => $username, 
            "email" => $email 
        ]); 
        $existing_user = $stmt->fetch(); 
        if ($existing_user) { 
            $errors[] = "Username or email already exists"; 
        } 
    } 

    // If there are still no errors then create  user
    if (empty($errors)) { 
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT); 
        $sql = "INSERT INTO users 
                (first_name, last_name, username, email, password, age, address) 
                VALUES 
                (:first_name, :last_name, :username, :email, :password, :age, :address)";
        $stmt = $pdo->prepare($sql); 
        $stmt->execute([ 
            "first_name" => $first_name, 
            "last_name" => $last_name, 
            "username" => $username, 
            "email" => $email, 
            "password" => $hashed_password, 
            "age" => $age, 
            "address" => $address 
        ]); 
    }
    //redirect to login
    header("Location: login.php");
    exit;
}     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php if (!empty($errors)): 
    ?>
    <?php foreach ($errors as $error): 
    ?>
    <p><?= htmlspecialchars($error) ?></p>//safely displays text in html
    <?php endforeach; 
    ?>
    <?php endif; 
    ?>

    <form id="signup_form" action="signup.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        <br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
        <br>
        <label for="username">User Name:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required> 
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" minlength="7" required>
        <br>
        <label for="age">Age:</label>
        <input type="number" id="age" name="age" required> 
        <br>
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
        <br>
        <button type="submit">Sign Up</button>
    </form>
    <script src="script.js"></script>
</body>
</html>