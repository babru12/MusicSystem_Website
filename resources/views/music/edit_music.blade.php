<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Music</title>
    <link href="{{url('/')}}/melodi/HTML/css/bootstrap.min.css" rel="stylesheet">	
<!-- Animate CSS -->
<link href="{{url('/')}}/melodi/HTML/css/animate.min.css" rel="stylesheet">
<!-- Basic stylesheet -->
<link rel="stylesheet" href="{{url('/')}}/melodi/HTML/css/owl.carousel.css">
<!-- Font awesome CSS -->
<link href="{{url('/')}}/melodi/HTML/css/font-awesome.min.css" rel="stylesheet">		
<!-- Custom CSS -->
<link href="{{url('/')}}/melodi/HTML/css/style.css" rel="stylesheet">
<link href="{{url('/')}}/melodi/HTML/css/style-color.css" rel="stylesheet">

<!-- Favicon -->
<link rel="shortcut icon" href="{{url('/')}}/melodi/HTML/img/logo/favicon.ico">
    <style>
        /* Body background */
        body {
            background: linear-gradient(120deg, #2980b9, #8e44ad);
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            color: #fff;
        }

        /* Add some padding to the container */
        .container {
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            color: #fff;
            margin-bottom:20px;
        }

        /* Style the form header */
        .form-header {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style the form inputs */
        input[type="file"],
        input[type="text"],
        select {
            margin-top: 10px;
            padding: 12px;
            border: 2px solid #fff;
            border-radius: 6px;
            width: calc(100% - 24px);
            font-size: 16px;
            transition: border-color 0.3s;
            background-color: transparent;
            color: #fff;
        }
    

        input[type="file"]:focus,
        input[type="text"]:focus,
        select:focus {
            border-color: #ff00ff;
        }

        /* Style the submit button */
        button[type="submit"] {
            margin-top: 20px;
            padding: 12px 20px;
            background-color: #ff00ff;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #ff99ff;
        }

        /* Style the message paragraph */
        p {
            margin-top: 10px;
            text-align: center;
            color: #ff00ff;
            font-weight: bold;
            font-size: 18px; /* Increased font size for emphasis */
        }

        /* Style the link */
        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #ff00ff;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s;
        }

        a:hover {
            color: #ff99ff;
        }

        /* Style the audio player */
        audio {
            width: 100%;
            margin-top: 20px;
            background-color: #222; /* Darker background for contrast */
            border-radius: 8px;
        }

        /* Style the image */
        img {
            display: block;
            margin: 20px auto;
            max-width: 100%;
            border-radius: 12px; /* Increased border radius for smoother edges */
            box-shadow: 0 0 20px rgba(255, 0, 255, 0.5); /* Purple shadow for extra effect */
        }
        option{
            color:black;
        }
        select{
            width:100%;
        }
    </style>
</head>
<body>
    @include('music.header2');
    <?php $albums = DB::select("select *from album"); ?>
    <div class="container">
        <div class="form-header">
            <h2 style="font-family: 'Comic Sans MS', cursive, sans-serif;">Update Music</h2>
        </div>
        <form action="" method="POST" enctype="multipart/form-data" id="addMusicForm">
            @csrf
            <select name="album_id" id="album_id">
                <option value="">Select your album</option>
                @foreach($albums as $album)
                    @if($album->id == $datas->albam_id)
                        <option value="{{ $album->id }}" selected>{{ $album->album_name }}</option>
                    @else
                        <option value="{{ $album->id }}">{{ $album->album_name }}</option>
                    @endif
                @endforeach
            </select>

            <input type="hidden" name="selected_album_id" id="selectedAlbumId">
            <audio controls>
                <source src="{{ url('/') }}/music/{{ $datas->musics }}" type="audio/mpeg">
            </audio>
            <br>
            <label style="color: #ff00ff;">Add song:</label> <input type="file" name="music" id="music" accept=".mp3">
            <br>
            <label style="color: #ff00ff;">Add Title:</label> <input type="text" name="title" id="title" value="{{ $datas->title }}">
            <br>
            <img src="{{ url('/') }}/photos/{{ $datas->photo }}">
            <br>
            <label style="color: #ff00ff;">Add photo of the image:</label> <input type="file" name="photo" id="photo">
            <br>
            <button type="submit" id="submitBtn">Update</button>
        </form>

        <p id="message">{{ $message }}</p>

        <a href="{{ url('/') }}/musiclist1">Music list</a>
    </div>
    @include('music.footer');

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#addMusicForm').submit(function(event) {
                event.preventDefault();
                $('#submitBtn').css('background-color', '#ff00ff');
                $('#submitBtn').animate({backgroundColor: '#ff99ff'}, 500);
                $('#message').html('Updating...').css('color', '#ff00ff').fadeIn(200).fadeOut(200).fadeIn(200);
                // AJAX request for form submission
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: new FormData(this),
                     processData: false,
                    contentType: false,
                    success: function(response) {
                        $('#message').html(response.message).css('color', '#00ff00').fadeIn();
                    },
                    error: function(xhr, status, error) {
                        $('#message').html(xhr.responseText).css('color', '#ff0000').fadeIn();
                    }
                });
            });
        });
    </script>
</body>
</html>
