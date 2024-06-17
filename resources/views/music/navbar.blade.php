<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhanced Navbar and Banner</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <style>
            @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");
        /* General Styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        /* Navbar Styles */
        .navbar {
            background: linear-gradient(45deg, #ff6f61, #de9e48, #4a90e2, #50bfa0);
            background-size: 400% 400%;
            animation: gradientBG 10s ease infinite;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            padding: 1.5rem 1rem;
        }
        .navbar-brand {
            color: #fff !important;
            font-size: 3.0rem;
            font-weight: bold;
            transform: translateX(-200%);
            animation: slideInLeft 1s forwards 0.5s;
        }
        .nav-link {
            color: #fff !important;
            margin-left: 20px;
            position: relative;
            display: inline-block;
            overflow: hidden;
            padding: 5px 0;
            transition: color 0.3s ease;
            font-size: 1.7rem;
        }
        .nav-link:before {
            content: "";
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #fff;
            visibility: hidden;
            transform: scaleX(0);
            transition: all 0.3s ease-in-out;
        }
        .nav-link:hover {
            color: #ffeb3b !important;
        }
        .nav-link:hover:before {
            visibility: visible;
            transform: scaleX(1);
        }
        .navbar-nav .nav-item {
            opacity: 0;
            animation: fadeIn 1s forwards;
        }
        .navbar-nav .nav-item:nth-child(1) {
            animation-delay: 0.6s;
        }
        .navbar-nav .nav-item:nth-child(2) {
            animation-delay: 0.8s;
        }
        .navbar-nav .nav-item:nth-child(3) {
            animation-delay: 1s;
        }
        .navbar-nav .nav-item:nth-child(4) {
            animation-delay: 1.2s;
        }

        /* Banner Styles */
        .banner {
            position: relative;
            height: 100vh;
            background: url('https://images.pexels.com/photos/1445416/pexels-photo-1445416.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            text-align: center;
            box-shadow: inset 0 0 0 1000px rgba(0, 0, 0, 0.3);
            margin-bottom:42px;
        }
        .banner h1 {
            font-size: 4rem;
            animation: slideInDown 1s ease-out;
            transform: translateY(-100%);
            animation: slideInDown 1s forwards;
        }
        .banner p {
            font-size: 1.5rem;
            opacity: 0;
            animation: fadeIn 2s forwards 1s;
        }

        /* Keyframes for Animation */
        @keyframes slideInLeft {
            from {
                transform: translateX(-200%);
            }
            to {
                transform: translateX(0);
            }
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        @keyframes slideInDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">MySite</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}/registration">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}/signup">Sign Up</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}/contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner -->
    <div class="banner">
        <div>
            <h1>Welcome to MySite</h1>
            <p>Your tagline or description goes here</p>
        </div>
    </div>

    @include('music.footer');

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
