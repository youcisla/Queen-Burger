<?php

// Disable caching
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 1 Jan 2000 00:00:00 GMT");


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Clear all session variables
unset($_SESSION["id"]);

// Destroy the session
session_destroy();

// Redirect to the login page or any other page you prefer
header('Location: base.php');
exit();
?>
