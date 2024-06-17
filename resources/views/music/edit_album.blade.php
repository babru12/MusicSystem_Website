<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Album</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        .maincontainer{
            height:150vh;
            width:100%;
            background:url('https://cdn.pixabay.com/photo/2016/09/27/23/03/guitar-1699501_1280.jpg');
            background-repeat:no-repeat;
            background-size:cover;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 630px;
            margin: 20px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
            font-size: 18px;
        }

        input[type="text"], input[type="file"] {
            padding: 10px;
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
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        img {
            margin-bottom: 20px;
            border-radius: 6px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%; /* Set image width to 100% */
            height: auto; /* Maintain aspect ratio */
        }

        p {
            text-align: center;
            margin-top: 20px;
            color: green;
        }
    </style>
</head>
<body>
    <div class="maincontainer">
    <div class="container">
        <h2>Edit Album</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name">Album Name:</label>
            <input type="text" name="name" id="name" value="{{$datas->album_name}}" required>

            <img src="{{url('/')}}/photos/{{$datas->photo}}" alt="Album Photo">

            <label for="photo">Update Album Photo:</label>
            <input type="file" name="photo" id="photo">

            <button type="submit">Update</button>

            <p>{{$message}}</p>
        </form>
    </div>
    </div>
</body>
</html>
