<?php
// Check if the admin is logged in
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("location: login.php");
    exit();
}

// Include your database connection file (config.php)
include("config.php");

// Additional dashboard content goes here

?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>

    <h2>Welcome to the Admin Dashboard</h2>

    <p>This is a secure area accessible only to logged-in admins.</p>
    <li><a href="list-siswa.php">Pendaftar</a></li>
    <a href="logout.php">Logout</a>

</body>
</html>
