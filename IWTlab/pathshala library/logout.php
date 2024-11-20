<?php
session_start(); // Session shuru karein

// Session destroy karein
session_destroy();

// Login page par redirect karein
header("Location: index.php");
exit();
?>
