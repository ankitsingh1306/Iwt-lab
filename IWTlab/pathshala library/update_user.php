<?php
include 'db.php'; // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password']; // New password, if provided
    $status = $_POST['status'];

    // Prepare SQL statement
    if (!empty($password)) {
        // Update user with new password
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, password = ?, status = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $name, $email, password_hash($password, PASSWORD_DEFAULT), $status, $id);
    } else {
        // Update user without changing the password
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, status = ? WHERE id = ?");
        $stmt->bind_param("ssii", $name, $email, $status, $id);
    }

    if ($stmt->execute()) {
        echo "User updated successfully!";
        header("Location: index.php"); // Redirect back to dashboard
    } else {
        echo "Error updating user: " . $conn->error;
    }

    $stmt->close();
}

$conn->close(); // Close the database connection
?>
