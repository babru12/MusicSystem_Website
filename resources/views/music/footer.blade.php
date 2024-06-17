<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .footer {
            position: relative;
            width: 100%;
            background: #3586ff;
            min-height: 100px;
            padding: 20px 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .social_icon,
        .menu {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
            flex-wrap: wrap;
        }

        .social_icon__item,
        .menu__item {
            list-style: none;
        }

        .social_icon__link {
            font-size: 2rem;
            color: #fff;
            margin: 0 10px;
            display: inline-block;
            transition: 0.5s;
        }

        .social_icon__link:hover {
            transform: translateY(-10px);
        }

        .menu__link {
            font-size: 1.2rem;
            color: #fff;
            margin: 0 10px;
            display: inline-block;
            transition: 0.5s;
            text-decoration: none;
            opacity: 0.75;
            font-weight: 300;
        }

        .menu__link:hover {
            opacity: 1;
        }

        .footer p {
            color: #fff;
            margin: 15px 0 10px 0;
            font-size: 1rem;
            font-weight: 300;
        }

        .wave {
            position: absolute;
            top: -100px;
            left: 0;
            width: 100%;
            height: 100px;
            background: url("https://i.ibb.co/wQZVxxk/wave.png");
            background-size: 1000px 100px;
        }

        .wave:nth-child(1) {
            z-index: 1000;
            opacity: 1;
            bottom: 0;
            animation: animateWaves 4s linear infinite;
        }

        .wave:nth-child(2) {
            z-index: 999;
            opacity: 0.5;
            bottom: 10px;
            animation: animate 4s linear infinite !important;
        }

        .wave:nth-child(3) {
            z-index: 1000;
            opacity: 0.2;
            bottom: 15px;
            animation: animateWaves 3s linear infinite;
        }

        .wave:nth-child(4) {
            z-index: 999;
            opacity: 0.7;
            bottom: 20px;
            animation: animate 3s linear infinite;
        }

        @keyframes animateWaves {
            0% {
                background-position-x: 1000px;
            }
            100% {
                background-position-x: 0px;
            }
        }

        @keyframes animate {
            0% {
                background-position-x: -1000px;
            }
            100% {
                background-position-x: 0px;
            }
        }
    </style>
</head>
<body>
    <footer class="footer">
        <div class="waves">
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
            <div class="wave"></div>
        </div>
        <ul class="social_icon">
            <li class="social_icon__item"><a class="social_icon__link" href="#">
                <ion-icon name="logo-facebook"></ion-icon>
            </a></li>
            <li class="social_icon__item"><a class="social_icon__link" href="#">
                <ion-icon name="logo-twitter"></ion-icon>
            </a></li>
            <li class="social_icon__item"><a class="social_icon__link" href="#">
                <ion-icon name="logo-linkedin"></ion-icon>
            </a></li>
            <li class="social_icon__item"><a class="social_icon__link" href="#">
                <ion-icon name="logo-instagram"></ion-icon>
            </a></li>
        </ul>
        <ul class="menu">
            <li class="menu__item"><a class="menu__link" href="#">Home</a></li>
       
            <li class="menu__item"><a class="menu__link" href="{{url('/')}}/contact">Contact</a></li>
        </ul>
        <p>Made by Babru</p>
    </footer>

    <!-- Include the Ionicons library -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
