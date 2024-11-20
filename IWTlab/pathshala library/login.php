<!-- <?php session_start();
  if(isset($_SESSION['user_id'])){
    header("Location:my_account");
  }
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pathshala Library</title>
    <link rel="stylesheet" href="./Assests/css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 20px;">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <img width="5%" height="auto" src="./Assests/img/pllogorb.png" alt="Pathshala Library">
            <a class="navbar-brand" href="#">Pathshala Library</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <?php if(isset($_SESSION['user_id'])){ ?>
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
                    <?php }?>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Signup</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
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

<h1 style="text-align: center; color: #333;">Login</h1>

<form action="login_process.php" method="POST" style="background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); max-width: 400px; margin: 0 auto;">
    <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold;">Email:</label>
    <input type="email" name="email" id="email" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 5px;">

    <label for="password" style="display: block; margin-bottom: 5px; font-weight: bold;">Password:</label>
    <input type="password" name="password" id="password" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ddd; border-radius: 5px;">

    <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 16px;">Login</button>
</form>
</body>
</html>
