<?php
// Database connection file ko include karein
include 'db.php'; 

session_start(); // Session shuru karein

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // User ID ko session se lein
    $user_id = $_SESSION['user_id'];

    // User input lein
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    // User details ko database se lein
    $sql = "SELECT * FROM users WHERE id='$user_id'";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();

    // Old password verify karein
    if ($old_password == $user['password']) { // Simple check, isse secure tarike se update karein
        // New password ko update karein
        $sql_update = "UPDATE users SET password='$new_password' WHERE id='$user_id'";
        if ($conn->query($sql_update) === TRUE) {
            echo "Password updated successfully!";
        } else {
            echo "Error updating password: " . $conn->error;
        }
    } else {
        echo "Old password is incorrect.";
    }

    $conn->close(); // Connection band karein
}
?>
