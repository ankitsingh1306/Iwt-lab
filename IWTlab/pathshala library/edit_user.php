<?php
include 'db.php';

$user_id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

if (!$user) {
    echo "User not found.";
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // User input lein
    $name = $conn->real_escape_string($_POST['name']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $email = $conn->real_escape_string($_POST['email']);
    $address = $conn->real_escape_string($_POST['address']);
    $aadhaar = $conn->real_escape_string($_POST['aadhaar']);
    $blood_group = $conn->real_escape_string($_POST['blood_group']);
    $father_name = $conn->real_escape_string($_POST['father_name']);
    $mother_name = $conn->real_escape_string($_POST['mother_name']);
    $parents_mobile = $conn->real_escape_string($_POST['parents_mobile']);
    $password = $_POST['password']; // New password (if provided)

    // Debugging: Check if password is being set
    if (isset($password) && !empty($password)) {
        // Update query ko prepare karein (with password update)
        $sql_update = "UPDATE users SET name=?, dob=?, mobile=?, email=?, address=?, aadhaar=?, 
                       blood_group=?, father_name=?, mother_name=?, parents_mobile=?, password=? 
                       WHERE id=?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("sssssssssssi", $name, $dob, $mobile, $email, $address, 
                                 $aadhaar, $blood_group, $father_name, $mother_name, 
                                 $parents_mobile, $password, $user_id); // Password ko bina hashing ke bind karein
    } else {
        // Agar password nahi diya gaya hai toh password ko update nahi karein
        $sql_update = "UPDATE users SET name=?, dob=?, mobile=?, email=?, address=?, aadhaar=?, 
                       blood_group=?, father_name=?, mother_name=?, parents_mobile=? WHERE id=?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("ssssssssssi", $name, $dob, $mobile, $email, 
                                 $address, $aadhaar, $blood_group, 
                                 $father_name, $mother_name, $parents_mobile, $user_id);
    }
    

    // Execute the update query
    if ($stmt_update->execute()) {
        echo "<script>alert('User updated successfully!'); window.location.href='Admin.php';</script>";
    } else {
        echo "Error updating user: " . $stmt_update->error; // Show specific error message
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        h1 { text-align: center; color: #333; }
        label { font-weight: bold; }
        input[type="text"], input[type="email"], input[type="password"], input[type="date"] {
            width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 5px;
        }
        button { width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Edit User Details</h1>
    <form action="edit_user.php?id=<?php echo $user_id; ?>" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" >

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" id="dob" value="<?php echo htmlspecialchars($user['dob']); ?>" >

        <label for="mobile">Mobile No:</label>
        <input type="text" name="mobile" id="mobile" value="<?php echo htmlspecialchars($user['mobile']); ?>" >

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" >

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($user['address']); ?>" >

        <label for="aadhaar">Aadhaar No:</label>
        <input type="text" name="aadhaar" id="aadhaar" value="<?php echo htmlspecialchars($user['aadhaar']); ?>" >

        <label for="blood_group">Blood Group:</label>
        <input type="text" name="blood_group" id="blood_group" value="<?php echo htmlspecialchars($user['blood_group']); ?>" >

        <label for="father_name">Father's Name:</label>
        <input type="text" name="father_name" id="father_name" value="<?php echo htmlspecialchars($user['father_name']); ?>" >

        <label for="mother_name">Mother's Name:</label>
        <input type="text" name="mother_name" id="mother_name" value="<?php echo htmlspecialchars($user['mother_name']); ?>" >

        <label for="parents_mobile">Parents' Mobile No:</label>
        <input type="text" name="parents_mobile" id="parents_mobile" value="<?php echo htmlspecialchars($user['parents_mobile']); ?>" >

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" value="" placeholder="Verify">

        <button type="submit">Update User</button>
    </form>
</div>

</body>
</html>
