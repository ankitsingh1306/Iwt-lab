<?php
include 'db.php'; // Include the database connection file

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the aadhaar key exists in the POST request
    if (isset($_POST['aadhaar'])) {
        // Get user input from the form and escape it
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password for security
        $aadhaar = $conn->real_escape_string($_POST['aadhaar']); // Get aadhaar

        // Validate aadhaar (if it's required)
        if (empty($aadhaar)) {
            echo "Aadhaar number is required.";
            exit();
        }

        // Check for duplicate aadhaar
        $checkAadhaarSql = "SELECT * FROM users WHERE aadhaar = '$aadhaar'";
        $resultAadhaar = $conn->query($checkAadhaarSql);

        if ($resultAadhaar->num_rows > 0) {
            echo "This Aadhaar number is already registered. Please use a different Aadhaar number.";
        } else {
            // Insert data into the database
            $sql = "INSERT INTO users (name, email, password, aadhaar) VALUES ('$name', '$email', '$password', '$aadhaar')";

            if ($conn->query($sql) === TRUE) {
                echo "Registration successful! You will receive an email within 24 hours with your login credentials.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Aadhaar number is required.";
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Pathshala Library</title>
    <link rel="stylesheet" href="./Assests/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px;">

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
                <?php if(isset($_SESSION['user_id'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="./todolist.html">Todo List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Browsing</a>
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
                <?php } ?>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Signup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="header__menu--link style2" href="my_account.php" style="position: fixed; right: 1rem; padding-top: 3%; transform: translateY(-50%);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25px" height="30px" viewBox="0 0 512 512">
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

<h1 style="text-align: center; color: #333;">Sign Up</h1>

<form action="register.php" method="POST" style="background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); max-width: 400px; margin: 0 auto;">
    <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold;">Name:</label>
    <input type="text" name="name" id="name" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 5px;">

    <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
    <input type="email" name="email" id="email" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 5px;">

    <label for="aadhaar" style="display: block; margin-bottom: 5px; font-weight: bold;">Aadhaar:</label>
    <input type="text" name="aadhaar" id="aadhaar" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 5px;">

    <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Password:</label>
    <input type="password" name="password" id="password" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 5px;">

    <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Sign Up</button>
</form>
</body>
</html>
