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
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        form {
            margin-top:150px;
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            animation: fadeInUp 0.6s ease both;
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
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            animation: fadeIn 0.6s ease both;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        input[type="file"], input[type="text"], select {
            width: calc(100% - 20px); /* Considering 10px padding on both sides */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            animation: slideInLeft 0.6s ease both;
        }
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        button {
            width: calc(100% - 20px); /* Considering 10px padding on both sides */
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 16px;
            animation: fadeInUp 0.6s ease both;
        }
        button:hover {
            background-color: #0056b3;
        }
        p {
            text-align: center;
            font-weight: bold;
            color: #007bff;
            margin-top: 10px;
            animation: fadeIn 0.6s ease both;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
            text-decoration: none;
            color: #007bff;
            font-size: 18px;
            animation: fadeIn 0.6s ease both;
        }
        select{
            padding:1.7rem;
            font-size:17px !important;
        }
        option{
            font-size:17px;
        }
    </style>


<?php
$user_id = Session::get('user_id');
$albums = DB::table('album')->where('user_id', $user_id)->get();
?> 
@include('music.header2');
@include('music.cardslider');
	<form action="" method="POST" enctype="multipart/form-data" id="addMusicForm">
    @csrf  
    <select name="album_id" id="album_id" onchange="load_song(this.value)">
        <option value="">Select your album</option>
        @foreach($albums as $album)
            <option value="{{ $album->id }}">{{ $album->album_name }}</option>
        @endforeach
    </select>

    <input type="hidden" name="selected_album_id" id="selectedAlbumId">
    Add song: <input type="file" name="music" id="music" accept=".mp3">
    <span>
        @error('music')
        <p style="color:red">{{$message}}</p>
        @enderror
    </span>
    Add Title: <input type="text" name="title" id="title">
    <span>
        @error('title')
        <p style="color:red">{{$message}}</p>
        @enderror
    </span>
    Add photo of the image: <input type="file" name="photo" id="photo">
    <span>
        @error('photo')
        <p style="color:red">{{$message}}</p>
        @enderror
    </span>
    <button type="submit">Submit</button>
</form>


<a href="{{url('/')}}/musiclist1">Music List</a>
@include('music.parallex2')
@include('music.footer');

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // $(document).ready(function() {
    //     $('#addmusic').change(function() {
    //         var selectedAlbumId = $(this).val();
    //         $('#selectedAlbumId').val(selectedAlbumId);
    //     });
    // });

    function load_song(str){
        $.get("{{url('/')}}/load_song/"+str , function(data){
            $("#songlist").html(data);
        })
    }
</script>