<?php
// Logout the admin
session_start();
session_unset();
session_destroy();

// Redirect to the login page
header("location: login.php");
exit();
?>
