<?php
// Database connection file ko include karein
include 'db.php'; 

session_start(); // Session shuru karein

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form se user input lein
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Database mein user ko check karein
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found
        $row = $result->fetch_assoc();

        // Password verify karein
        if ($password == $row['password']) { // Simple password check
            // Password sahi hai, user ko login karein
            $_SESSION['user_id'] = $row['id']; // User ID session mein store karein
            $_SESSION['user_name'] = $row['name']; // User name session mein store karein
            
            // Home page par redirect karein
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password. Please try again.";
        }
    } else {
        echo "No user found with this email.";
    }

    // Connection band karein
    $conn->close();
}
?>
