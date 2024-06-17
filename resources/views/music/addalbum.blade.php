<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Album</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* General Styles */
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@200;300;400;500;600;700&display=swap");
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
        }

        /* Navbar Styles */
        .navbar {
            background: linear-gradient(45deg, #ff6f61, #de9e48, #4a90e2, #50bfa0);
            background-size: 400% 400%;
            animation: gradientBG 10s ease infinite;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 1rem;
        }
        .navbar-brand {
            color: black !important;
            font-size: 1.5rem;
            font-weight: bold;
        }
        .nav-link {
            color: black !important;
            margin-left: 15px;
            font-size: 1rem;
        }
        .nav-link:hover {
            color: #ffeb3b !important;
        }

        /* Keyframes for Animation */
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

        /* Container Styles */
        .container {
            max-width: 1100px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.5s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
            font-size: 24px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 10px;
            color: #555;
            font-size: 18px;
        }

        input[type="text"], input[type="file"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #007bff;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s;
            width: 100%;
            box-sizing: border-box;
            color: #333;
        }

        input[type="text"]:focus, input[type="file"]:focus {
            outline: none;
            border-color: #0056b3;
        }

        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 14px 24px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            font-size: 16px;
        }
        .maincontainer{
            height:90vh;
            width:100%;
            background:url("https://cdn.pixabay.com/photo/2022/10/03/12/03/microphone-7495739_1280.jpg");
            display:flex;
            justify-content:center;
            align-items:center;
            margin-bottom:60px;
            
        }
    
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Welcome</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/addalbum"><i class="fas fa-plus-circle"></i> Add Album</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/addmusic"><i class="fas fa-music"></i> Add Music</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/musiclist1"><i class="fas fa-list"></i> Music List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/list"><i class="fas fa-list-alt"></i> Album List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
 <div class="maincontainer">
    <div class="container">
        <h2>Add Album</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Album Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="photo">Album Photo:</label>
            <input type="file" name="photo" id="photo" accept="image/*" required>

            <button type="submit">Submit</button>

            <p>{{ $message }}</p>
        </form>
    </div>
    </div>
    @include('music.footer');

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
