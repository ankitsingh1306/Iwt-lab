<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin_id'])) {
    header("Location: adminfnt.php");
    exit();
}

$query = "SELECT * FROM users";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa; /* Light background */
        }
        h1, h2 {
            color: #4a4a4a; /* Darker text color */
        }
        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th {
            background-color: #007bff; /* Bootstrap primary color */
            color: white;
            padding: 10px;
            text-align: left;
        }
        td {
            background-color: #ffffff; /* White background for table cells */
            padding: 10px;
            border: 1px solid #dee2e6; /* Light border */
        }
        tr:nth-child(even) td {
            background-color: #f2f2f2; /* Alternating row color */
        }
        tr:hover td {
            background-color: #e9ecef; /* Hover effect */
        }
        .container {
            margin: 20px auto;
            max-width: 1200px; /* Center the table */
            background-color: white; /* Background color for container */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Padding inside container */
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); /* Shadow effect */
        }
        .nav-link {
            color: #007bff; /* Nav link color */
        }
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
                    <a class="nav-link" href="logout.php">logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h1>Admin Dashboard</h1>
    <h2>Users List</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>DOB</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Address</th>
            <th>Aadhaar</th>
            <th>Blood Group</th>
            <th>Father's Name</th>
            <th>Mother's Name</th>
            <th>Parents Mobile</th>
            <th>Password</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <?php while ($user = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['dob']; ?></td>
                <td><?php echo $user['mobile']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['address']; ?></td>
                <td><?php echo $user['aadhaar']; ?></td>
                <td><?php echo $user['blood_group']; ?></td>
                <td><?php echo $user['father_name']; ?></td>
                <td><?php echo $user['mother_name']; ?></td>
                <td><?php echo $user['parents_mobile']; ?></td>
                <td><?php echo $user['password']; ?></td>
                <td><?php echo $user['created_at']; ?></td>
                <td><a href="edit_user.php?id=<?php echo $user['id']; ?>" class="btn btn-primary btn-sm">Edit</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
