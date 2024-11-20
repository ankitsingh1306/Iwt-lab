<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Pathshala Library</title>
    <link rel="stylesheet" href="./Assests/css/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background: linear-gradient(to right, #880036,#91eae4);">
    <style>
        .gallery-container {
            margin-top: 30px;
        }

        .library-info {
            background: linear-gradient(to right, #880036, #91eae4);
        }

        .gallery-img {
            border-radius: 10px;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            width: 100%;

        }

        .gallery-img:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }

        .description-box {
            display: flex;
            align-items: center;
        }

        .description {
            border: 2px solid #ddd;
            border-radius: 10px;
            padding: 15px;
        }

        #desc-title {
            font-size: 18px;
            color: #333;
        }

        #desc-text {
            font-size: 14px;
            color: #555;
        }

        /* Slider container styling */
        .slider {
            position: relative;
            width: 100%;
            
            height: 100%;
            margin: auto;
            margin-top: 10px;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        /* Slide image styling */
        .slides {
            display: flex;
            transition: transform 1s ease-in-out;
            /* Animation effect */
        }

        .slide {
            width:80rem;
            height: 30rem;
            object-fit: cover;
        }

        /* Navigation buttons */
        .slider-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            font-size: 2rem;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px;
            z-index: 10;
            outline: none;
            border-radius: 50%;
        }

        .prev {
            left: 10px;
        }

        .next {
            right: 10px;
        }
    </style>
    <!-- navbar  -->

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


                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="./todolist.html">Todo List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./browsing.html">Browesing</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./Ebook.html">EBooks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./focus.html">Focus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./calculator.html">Calculator</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./quiz.html">Quizs</a>
                        </li>
                    <?php } ?>

                    <?php if (isset($_SESSION['user_id'])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">logout</a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Signup</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Admin.php">Admin</a>
                        </li>
                    <?php } ?>

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

    <!-- image -->
    <!-- <img src="./Assests/img/plslider1.png" class="img-fluid" alt="Self Library "> -->
    <div class="slider">
        <div class="slides">
            <img src="./Assests/img/s1.png" class="slide" alt="Image 1">
            <img src="./Assests/img/s2.png" class="slide" alt="Image 2">
            <img src="./Assests/img/s3.png" class="slide" alt="Image 3">
            <img src="./Assests/img/plslider1.png" class="slide" alt="Image 4">
        </div>
        <button class="slider-btn prev" onclick="prevSlide()">❮</button>
        <button class="slider-btn next" onclick="nextSlide()">❯</button>
    </div>
    <!--section -->
    <div class="library-info">
        <h1>Welcome to Pathshala Library</h1>
        <p class="fade-in">Pathshala Library is your gateway to knowledge and discovery. We provide access to a wide range of books, journals, and digital resources. Whether you are a student, professional, or avid reader, our library is designed to fulfill your reading and research needs.</p>

        <h2 class="slide-in-left">What We Offer</h2>
        <ul class="fade-in-up">
            <li style="background: linear-gradient(to right, #880036,#91eae4);">Vast collection of books and e-resources</li>
            <li style="background: linear-gradient(to right, #880036,#91eae4);">Student and professional memberships</li>
            <li style="background: linear-gradient(to right, #880036,#91eae4);">Quiet reading spaces and study rooms</li>
            <li style="background: linear-gradient(to right, #880036,#91eae4);">Book reservations and home delivery service</li>
            <li style="background: linear-gradient(to right, #880036,#91eae4);">Workshops, seminars, and special events</li>
        </ul>

        <h2 class="slide-in-right">Our Vision</h2>
        <p class="fade-in">At Pathshala Library, we aim to foster a lifelong love of learning. Our mission is to create a community where people come together to exchange ideas, explore new subjects, and grow intellectually. Join us and be part of a learning revolution.</p>
    </div>


    <!-- card -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="./Assests/img/3.png" class="card-img-top" alt="Ebook">
                    <div class="card-body">
                        <h5 class="card-title">Ebook</h5>
                        <p class="card-text">Create your account quickly and gain a great experience!</p>
                        <a href="./register.php" class="btn btn-primary">Sign Up Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="./Assests/img/1.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Browsing</h5>
                        <p class="card-text">Create your account quickly and gain a great experience!</p>
                        <a href="./register.php" class="btn btn-primary">Sign Up Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <img src="./Assests/img/2.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Focus Mood</h5>
                        <p class="card-text">Create your account quickly and gain a great experience!</p>
                        <a href="./register.php" class="btn btn-primary">Sign Up Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- card end -->
    <!-- gallery  -->
    <div class="container gallery-container">
        <div class="row">
            <div class="col-lg-9 col-md-8">
                <div class="row">
                    <!-- Repeat this block for 15 images -->
                    <div class="col-4 mb-3">
                        <img src="./Assests/img/ag.jpg" alt="Image 1" class="img-fluid gallery-img" onclick="showDescription(0)">
                    </div>
                    <div class="col-4 mb-3">
                        <img src="./Assests/img/ad.jpg" alt="Image 2" class="img-fluid gallery-img" onclick="showDescription(1)">
                    </div>
                    <div class="col-4 mb-3">
                        <img src="./Assests/img/af.jpg" alt="Image 3" class="img-fluid gallery-img" onclick="showDescription(2)">
                    </div>
                    <div class="col-4 mb-3">
                        <img src="./Assests/img/aj.jpg" alt="Image 4" class="img-fluid gallery-img" onclick="showDescription(3)">
                    </div>
                    <div class="col-4 mb-3">
                        <img src="./Assests/img/ah.jpg" alt="Image 5" class="img-fluid gallery-img" onclick="showDescription(4)">
                    </div>
                    <div class="col-4 mb-3">
                        <img src="./Assests/img/ak.jpg" alt="Image 6" class="img-fluid gallery-img" onclick="showDescription(5)">
                    </div>
                    <div class="col-4 mb-3">
                        <img src="./Assests/img/sd.jpg" alt="Image 7" class="img-fluid gallery-img" onclick="showDescription(6)">
                    </div>
                    <div class="col-4 mb-3">
                        <img src="./Assests/img/sf.jpg" alt="Image 8" class="img-fluid gallery-img" onclick="showDescription(7)">
                    </div>
                    <div class="col-4 mb-3">
                        <img src="./Assests/img/sg.jpg" alt="Image 9" class="img-fluid gallery-img" onclick="showDescription(8)">
                    </div>
                    <div class="col-4 mb-3">
                        <img src="./Assests/img/sh.jpg" alt="Image 10" class="img-fluid gallery-img" onclick="showDescription(9)">
                    </div>
                    <div class="col-4 mb-3">
                        <img src="./Assests/img/sk.jpg" alt="Image 11" class="img-fluid gallery-img" onclick="showDescription(10)">
                    </div>
                    <div class="col-4 mb-3">
                        <img src="./Assests/img/sj.jpg" alt="Image 12" class="img-fluid gallery-img" onclick="showDescription(11)">
                    </div>
                    <!-- Add more images similarly until 15 -->
                </div>
            </div>
            <div class="col-lg-3 col-md-4 description-box">
                <div class="description p-4 bg-light">
                    <h4 id="desc-title">Image Title</h4>
                    <p id="desc-text">Click on an image to see the description here.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- footsection -->
    <!-- Footer Section -->
    <!-- Footer Section -->
    <footer style="background-color: #34495e; color: white; padding: 30px 0; text-align: center; font-family: Arial, sans-serif; box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1); position: relative;">
        <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; flex-wrap: wrap;">

            <!-- Left Side: Copyright and Social Media -->
            <div style="flex: 1; text-align: left; padding: 20px;">
                <p style="margin: 0; font-size: 18px; font-weight: 600;">&copy; 2024 Pathshala Library. All rights reserved.</p>
                <p style="margin: 10px 0 20px; font-size: 14px; font-weight: 400;">Follow us on:</p>
                <div style="margin-bottom: 20px;">
                    <a href="https://facebook.com" target="_blank" style="color: #ffffff; font-size: 20px; margin: 0 15px; text-decoration: none; transition: transform 0.3s;">
                        <i class="fa fa-facebook" style="font-size: 20px;">Facebook</i>
                    </a>
                    <a href="https://twitter.com" target="_blank" style="color: #ffffff; font-size: 20px; margin: 0 15px; text-decoration: none; transition: transform 0.3s;">
                        <i class="fa fa-twitter" style="font-size: 20px;">Twitter</i>
                    </a>
                    <a href="https://instagram.com" target="_blank" style="color:#ffffff; font-size: 20px; margin: 0 15px; text-decoration: none; transition: transform 0.3s;">
                        <i class="fa fa-instagram" style="font-size: 20px;">Instagram</i>
                    </a>
                </div>
                <p style="font-size: 12px; color: #bdc3c7;">Powered by Pathshala Library Team</p>
            </div>

            <!-- Right Side: Map -->
            <div style="flex: 1; padding: 20px; text-align: center;">
                <h3 style="margin-bottom: 15px; font-size: 18px;">Find Us Here</h3>
                <iframe src="https://maps.google.com/maps?q=Pondicherry%20University&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="200" frameborder="0" style="border:0; border-radius: 8px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>

        <!-- Bottom Section: Services Links -->


    </footer>
    <!-- End of Footer Section -->

    <!-- End of Footer Section -->




    <!-- gallery end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="./Assests/js/script.js"></script>
    <script>
        const slides = document.querySelectorAll(".slide");
        let currentIndex = 0;

        // Show slide based on index
        function showSlide(index) {
            const offset = -index * 100; // Offset for translateX
            document.querySelector(".slides").style.transform = `translateX(${offset}%)`;
        }

        // Next slide function
        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            showSlide(currentIndex);
        }

        // Previous slide function
        function prevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(currentIndex);
        }

        // Auto-slide every 3 seconds
        setInterval(nextSlide, 3000);

        // Start with the first slide
        showSlide(currentIndex);
    </script>
    <script>
        const descriptions = [{
                title: "Pathshala Library",
                text: "Table Space."
            },
            {
                title: "Pathshala Library",
                text: "Pathshala Library Office Area."
            },
            {
                title: "Image 3",
                text: "Chilling Space."
            },
            {
                title: "Pathshala Library",
                text: "Cafeteria."
            },
            {
                title: "Image 5",
                text: "Bio-Metric Attendece ."
            },
            {
                title: "Image 6",
                text: "Pathshala Library Clean Wall with +ve Poster."
            },
            {
                title: "Image 7",
                text: "Pathshala Library ."
            },
            {
                title: "Image 8",
                text: "Pathshala Library Chilling Space."
            },
            {
                title: "Image 9",
                text: "Pathshala Library Daily NewsPaper and Magazine Space."
            },
            {
                title: "Image 10",
                text: "Pathshala Library Looker."
            },
            {
                title: "Image 11",
                text: "Pathshala Library Chilling Space."
            },
            {
                title: "Image 12",
                text: "Pathshala Library Chilling Space."
            },
            {
                title: "Image 13",
                text: "This is the description for Image 13."
            },
            {
                title: "Image 14",
                text: "This is the description for Image 14."
            },
            {
                title: "Image 15",
                text: "This is the description for Image 15."
            }
        ];

        function showDescription(index) {
            document.getElementById('desc-title').innerText = descriptions[index].title;
            document.getElementById('desc-text').innerText = descriptions[index].text;
        }
    </script>
</body>

</html>