<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>
    <form action="signup.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required>
        <br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required>
        <br>
        <label for="user_name">User Name:</label>
        <input type="text" id="user_name" name="user_name" required>
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
</body>
</html>