<?php
session_start();
session_unset(); // Unset session variables
session_destroy(); // Destroy session
header("Location: ../shop.html"); // Redirect to login page
exit();
?>
