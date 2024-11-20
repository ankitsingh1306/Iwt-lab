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
    <title>My Account - Pathshala Library</title>
    <link rel="stylesheet" href="./Assests/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
        .alert { color: red; text-align: center; margin: 15px 0; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img width="5%" height="auto" src="./Assests/img/pllogorb.png" alt="Pathshala Library">
            <a class="navbar-brand" href="index.php">Pathshala Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="./todolist.html">Todo List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./browsing.html">Browesing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">EBooks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./focus.html">Focus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./calculator.html">Calculator</a>
                    </li>  
                    <li class="nav-item">
                        <a class="nav-link" href="./quiz.html">Quiz</a>
                    </li>                 
                    <li class="nav-item">
                        <a class="header__menu--link style2" href="my_account.php" style="position: fixed; right: 1rem; padding-top: 3%; transform: translateY(-50%);">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="30px" viewBox="0 0 512 512" >
                                <path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" />
                                <path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                            </svg>
                            <span class="visually-hidden">My Account</span>
                        </a>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="container">
    <h1>My Account</h1>
    
    <!-- Alert Message for Incomplete Profile -->
    <div class="alert">
        <?php
        if (empty($user['address']) || empty($user['aadhaar']) || empty($user['blood_group']) || empty($user['father_name']) || empty($user['mother_name'])) {
            echo "Please complete your profile. Some fields are marked as N/A.";
        }
        ?>
    </div>
    
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
        <input type="text" name="address" id="address" value="<?php echo !empty($user['address']) ? htmlspecialchars($user['address']) : 'N/A'; ?>" required>

        <label for="aadhaar">Aadhaar No:</label>
        <input type="text" name="aadhaar" id="aadhaar" value="<?php echo !empty($user['aadhaar']) ? htmlspecialchars($user['aadhaar']) : 'N/A'; ?>" required>

        <label for="blood_group">Blood Group:</label>
        <input type="text" name="blood_group" id="blood_group" value="<?php echo !empty($user['blood_group']) ? htmlspecialchars($user['blood_group']) : 'N/A'; ?>" required>

        <label for="father_name">Father's Name:</label>
        <input type="text" name="father_name" id="father_name" value="<?php echo !empty($user['father_name']) ? htmlspecialchars($user['father_name']) : 'N/A'; ?>" required>

        <label for="mother_name">Mother's Name:</label>
        <input type="text" name="mother_name" id="mother_name" value="<?php echo !empty($user['mother_name']) ? htmlspecialchars($user['mother_name']) : 'N/A'; ?>" required>

        <label for="parents_mobile">Parents' Mobile No:</label>
        <input type="text" name="parents_mobile" id="parents_mobile" value="<?php echo htmlspecialchars($user['parents_mobile']); ?>" required>

        <button type="submit">Update Details</button>
    </form>

    <h2>Change Password</h2>
    <form action="change_password.php" method="POST">
        <label for="old_password">Old Password:</label>
        <input type="password" name="old_password" id="old_password" required>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" id="new_password" required>

        <button type="submit">Change Password</button>
    </form>

    <h2>Logout</h2>
    <form action="logout.php" method="POST">
        <button type="submit">Logout</button>
    </form>
</div>

</body>
</html>
