<?php
// Include your database connection file (config.php)
include("config.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate input
    if (empty($username) || empty($password)) {
        $error = "Username and password are required!";
    } else {
        // Check the database for the admin credentials
        $query = "SELECT * FROM mimin WHERE username='$username' AND password='$password'";
        $result = mysqli_query($db, $query);

        // Check if the query was successful
        if ($result) {
            $row = mysqli_fetch_assoc($result);

            // Check if the admin credentials are correct
            if ($row) {
                // Admin login successful
                session_start();
                $_SESSION['admin_id'] = $row['id'];
                header("location: dashboard.php"); // Redirect to the admin dashboard
                exit();
            } else {
                $error = "Invalid username or password!";
            }
        } else {
            $error = "Database query failed!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

    <h2>Admin Login</h2>

    <?php
    // Display error message, if any
    if (isset($error)) {
        echo "<p style='color: red;'>$error</p>";
    }
    ?>

    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <br>

        <input type="submit" value="Login">
    </form>

</body>
</html>
