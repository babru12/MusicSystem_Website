<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        

.contain {
    height: 100vh;
    width: 100%;
    background-image: url(https://images.pexels.com/photos/17245102/pexels-photo-17245102/free-photo-of-white-toyota-gt86-on-a-parking-lot-at-night.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);
    background-repeat: no-repeat;
    background-size: cover;
}

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    color:white;
}

body {
    background-color: white;
}

.mainc {
    background-color: rgba(24, 24, 24, 0.952);

}

form {
    min-height: 480px;
    width: 400px !important;
    background-color: rgba(255, 255, 255, 0.13);
    position: absolute;
    transform: translate(-50%, -50%);
    top: 45%;
    left: 31%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
    padding: 50px 35px;
}


form * {
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}

form h3 {
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label {
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}

input {
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255, 255, 255, 0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}

::placeholder {
    color: rgb(215, 209, 209);
}

button {
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
form {
    min-height: 480px;
    width: 530px !important;
    background-color: rgba(255, 255, 255, 0.13);
    position: absolute;
    top: 30%;
    right: 5%;
    transform: translate(5%, 0%);
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 0 40px rgba(8, 7, 16, 0.6);
    padding: 50px 35px;
}
    </style>
</head>
<body>
@include('music.header');
<div class="contain">
    <form action="" method="POST" class="mainc">
    <h3>signup here</h3>
        @csrf
        Name*: <input type="text" name="name" id="name" placeholder="Enter your Name"><br>
        <span>
            @error('name')
            <p style="color:red">{{$message}}</p>
            @enderror
        </span>
        user_id*: <input type="text" name="user_id" id="user_id" placeholder="Enter your user_ID"><br>
        <span>
            @error('user_id')
            <p style="color:red">{{$message}}</p>
            @enderror
        </span>
        Email*: <input type="email" name="email" id="email" placeholder="Enter your Email ID" ><br>
        <span>
            @error('email')
            <p style="color:red">{{$message}}</p>
            @enderror
        </span>
        Password*: <input type="password" name="password" id="password" placeholder="Enter your password"><br>
        <span>
            @error('password')
            <p style="color:red">{{$message}}</p>
            @enderror
        </span>
        <button type="submit">submit</button>
    </form>
</div>

</body>
</html>
