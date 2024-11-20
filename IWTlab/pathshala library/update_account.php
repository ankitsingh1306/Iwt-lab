<?php
// Database connection file ko include karein
include 'db.php'; 

session_start(); // Session shuru karein

// User ID ko session se lein
$user_id = $_SESSION['user_id'];

// Agar user login nahi hai toh redirect karein
if (!isset($user_id)) {
    header("Location: login.php");
    exit();
}

// Form submit hone par update karne ki process
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Input fields ko sanitize karein
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

    // Update query
    $sql = "UPDATE users SET name='$name', dob='$dob', mobile='$mobile', email='$email', address='$address', aadhaar='$aadhaar', blood_group='$blood_group', father_name='$father_name', mother_name='$mother_name', parents_mobile='$parents_mobile' WHERE id='$user_id'";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Record updated successfully'); window.location.href='my_account.php';</script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// User details ko database se lein
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$conn->close(); // Connection band karein
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Account</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px; }
        nav { background-color: #007bff; padding: 15px; }
        nav ul { list-style-type: none; padding: 0; }
        nav ul li { display: inline; margin-right: 20px; }
        nav ul li a { color: white; text-decoration: none; font-weight: bold; }
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

<nav>
    <ul>
        <li><a href="register.php">Sign Up</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="my_account.php">My Account</a></li>
        <li><a href="change_password.php">Change Password</a></li>
        <li><a href="update_account.php">Update Account</a></li> <!-- Add link to update account page -->
    </ul>
</nav>

<div class="container">
    <h1>Update Account</h1>
    <form action="update_account.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" id="dob" value="<?php echo htmlspecialchars($user['dob']); ?>" required>

        <label for="mobile">Mobile No:</label>
        <input type="text" name="mobile" id="mobile" value="<?php echo htmlspecialchars($user['mobile']); ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>

        <label for="address">Address:</label>
        <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($user['address']); ?>" required>

        <label for="aadhaar">Aadhaar No:</label>
        <input type="text" name="aadhaar" id="aadhaar" value="<?php echo htmlspecialchars($user['aadhaar']); ?>" required>

        <label for="blood_group">Blood Group:</label>
        <input type="text" name="blood_group" id="blood_group" value="<?php echo htmlspecialchars($user['blood_group']); ?>" required>

        <label for="father_name">Father's Name:</label>
        <input type="text" name="father_name" id="father_name" value="<?php echo htmlspecialchars($user['father_name']); ?>" required>

        <label for="mother_name">Mother's Name:</label>
        <input type="text" name="mother_name" id="mother_name" value="<?php echo htmlspecialchars($user['mother_name']); ?>" required>

        <label for="parents_mobile">Parents' Mobile No:</label>
        <input type="text" name="parents_mobile" id="parents_mobile" value="<?php echo htmlspecialchars($user['parents_mobile']); ?>" readonly>

        <button type="submit">Update Details</button>
    </form>
</div>

</body>
</html>
