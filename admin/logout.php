<?php
session_start();  //start the session

session_unset();  // cleaer session data..

session_destroy(); // destroying the session..

header('Location: index.php'); // Redirecting the user to index page...

exit();
?>