<?php

session_start();

if (!isset($_SESSION["user_id"])) {//check if there is a logged in user id in the session
    header("Location: login.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Welcome, <?= htmlspecialchars($_SESSION["user_name"]) ?></h1>
    <p>You logged in successfully</p>
    <a href="logout.php">Logout</a>
</body>

</html>