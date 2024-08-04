<?php
session_start();
include 'connect.php';

// Redirect to join_now.php if the session is not set
if(!isset($_SESSION['jemail'])){
    header("Location: join_now.php");
    exit();
}

// Fetch user details
$email = $_SESSION['jemail'];
$query = mysqli_query($conn, "SELECT * FROM Join_tbl WHERE memberemail='$email'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Steel Titan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .welcome-container {
            background: linear-gradient(to right, #f97316, #9a3412);
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            color: white;
            width: 100%;
            max-width: 500px;
        }
        .welcome-container h1 {
            margin-bottom: 20px;
            font-size: 32px;
        }
        .welcome-container p {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .welcome-container a {
            color: white;
            text-decoration: none;
            font-weight: bold;
        }
        .logout-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        .logout-button:hover {
            background-color: #222;
        }
    </style>
</head>
<body>
    <div class="welcome-container">
        <h1>Welcome to Steel Titan!</h1>
        <p>Hello, <?php echo htmlspecialchars($user['membername']); ?> :)</p>
        <p>Your email: <?php echo htmlspecialchars($user['memberemail']); ?></p>
        <p>Your height: <?php echo htmlspecialchars($user['memberheight']); ?> cm</p>
        <p>Your weight: <?php echo htmlspecialchars($user['memberweight']); ?> kg</p>
        <form method="post" action="logout.php">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
</body>
</html>
