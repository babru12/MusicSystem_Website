<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/skin/blue.monday/jplayer.blue.monday.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: 20px auto;
            max-width: 1200px;
        }
        .music-card {
            display: flex;
            flex-direction: column;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .music-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .music-card img {
            width: 100%;
            height: auto;
            max-height: 250px;
            object-fit: cover;
        }
        .music-details {
            padding: 20px;
            text-align: center;
        }
        .music-details h3 {
            margin-top: 0;
            font-size: 1.5em;
            color: #333;
        }
        .jp-audio {
            margin-top: 20px;
        }
        .jp-controls {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        .actions {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 20px;
        }
        .edit-btn, .delete-btn {
            color: #fff;
            background-color: #007bff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 25px;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 1em;
        }
        .delete-btn {
            background-color: #dc3545;
        }
        .edit-btn:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }
        .delete-btn:hover {
            background-color: #c82333;
            transform: translateY(-3px);
        }
        .search-form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .search-form input {
            padding: 10px;
            font-size: 1em;
            border: 2px solid #007bff;
            border-radius: 25px 0 0 25px;
            outline: none;
            width: 70%;
            max-width: 400px;
        }
        .search-form button {
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 0 25px 25px 0;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .search-form button:hover {
            background-color: #0056b3;
        }

        /* Custom styles for jPlayer */
        .jp-controls .jp-play,
        .jp-controls .jp-pause,
        .jp-controls .jp-next,
        .jp-controls .jp-previous {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 2em;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        .jp-controls .jp-play:hover,
        .jp-controls .jp-pause:hover,
        .jp-controls .jp-next:hover,
        .jp-controls .jp-previous:hover {
            background-color: #0056b3;
            transform: scale(1.1);
        }
        .jp-time-holder {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
            font-size: 1em;
            color: #333;
            font-weight: bold;
        }
        .jp-time-holder .jp-current-time,
        .jp-time-holder .jp-duration {
            background-color: #f4f4f9;
            padding: 5px 10px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .delete{
            padding:1rem 2rem;
            font-size:20px;
            border-radius:10px;
            transition:0.5s ease-out;
        }
        .delete:hover{
            background-color:red;
            color:black;
        }
        .delete-box{
            text-align:center;
            margin-bottom:50px;
            margin-top:20px;
        }
        .row{
            display:flex;
            justify-content:center;
            font-size:20px;
        }
    </style>
</head>
<body>
    @include('music.header2')
    <div class="container">
        <form action="search" method="GET" class="search-form">
            <input type="search" name="search" placeholder="Search for music...">
            <button type="submit" class="btn">Search</button>
        </form>
        <!-- <form action="{{url('/')}}/delete_songs" method="POST">
         @csrf -->
        @foreach($datas as $index => $data)
        <div class="music-card">
        <div class="music-checkbox">
                <input type="checkbox"  name="ids[{{$data->id}}]" value="{{ $data->id }}">
            </div>
            <img src="{{ url('/') }}/photos/{{ $data->photo }}" alt="{{ $data->title }}">
            <div class="music-details">
                <h3>{{ $data->title }}</h3>
                <div id="jquery_jplayer_{{$index+1}}" class="jp-jplayer"></div>
                <div id="jp_container_{{$index+1}}" class="jp-audio" role="application" aria-label="media player">
                    <div class="jp-type-single">
                        <div class="jp-gui jp-interface">
                            <div class="jp-controls">
                                <button class="jp-previous" role="button" tabindex="0"><i class="fas fa-backward"></i></button>
                                <button class="jp-play" role="button" tabindex="0"><i class="fas fa-play"></i></button>
                                <button class="jp-pause" role="button" tabindex="0" style="display: none;"><i class="fas fa-pause"></i></button>
                                <button class="jp-next" role="button" tabindex="0"><i class="fas fa-forward"></i></button>
                            </div>
                            <div class="jp-progress">
                                <div class="jp-seek-bar">
                                    <div class="jp-play-bar"></div>
                                </div>
                            </div>
                            <div class="jp-time-holder">
                                <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
                                <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
                            </div>
                        </div>
                        <div class="jp-no-solution">
                            <span>Update Required</span>
                            To play the media you will need to either update your browser to a recent version or update your 
                            <a href="https://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <a href="{{url('/')}}/edit_music/{{Crypt::encrypt($data->id)}}" class="edit-btn"> <i class="fa-solid fa-user-pen"></i> Edit</
                    a>
                    <a href="{{url('/')}}/delete_music/{{Crypt::encrypt($data->id)}}" onclick="return ask()" class="delete-btn"> <i class="fa-solid fa-trash"></i>  Delete</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">{{ $datas->links() }} </div>

    <div class="delete-box"><button type="submit" class="delete">delete selected songs</button></div>

    <!-- </form> -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/jplayer/jquery.jplayer.min.js"></script>
    
    <script>
        $(document).ready(function() {
            var players = [];
            @foreach($datas as $index => $data)
                (function(index) {
                    var player = $("#jquery_jplayer_" + (index + 1)).jPlayer({
                        ready: function () {
                            $(this).jPlayer("setMedia", {
                                mp3: "{{ url('/') }}/music/{{ $data->musics }}"
                            });
                        },
                        swfPath: "/js",
                        supplied: "mp3",
                        cssSelectorAncestor: "#jp_container_" + (index + 1),
                        useStateClassSkin: true,
                        autoBlur: false,
                        smoothPlayBar: true,
                        keyEnabled: true,
                        remainingDuration: true,
                        toggleDuration: true,
                        ended: function() {
                            var nextIndex = index + 1;
                            if (nextIndex < players.length) {
                                players[nextIndex].jPlayer("play");
                            }
                        }
                    });

                    players.push(player);

                    player.bind($.jPlayer.event.play, function() {
                        $.each(players, function(i, p) {
                            if (p !== player) {
                                p.jPlayer("pause");
                            }
                        });
                        $("#jp_container_" + (index + 1) + " .jp-play").hide();
                        $("#jp_container_" + (index + 1) + " .jp-pause").show();
                    }).bind($.jPlayer.event.pause, function() {
                        $("#jp_container_" + (index + 1) + " .jp-play").show();
                        $("#jp_container_" + (index + 1) + " .jp-pause").hide();
                    });

                    $("#jp_container_" + (index + 1) + " .jp-next").on("click", function() {
                        var nextIndex = index + 1;
                        if (nextIndex < players.length) {
                            players[nextIndex].jPlayer("play");
                        }
                    });

                    $("#jp_container_" + (index + 1) + " .jp-previous").on("click", function() {
                        var previousIndex = index - 1;
                        if (previousIndex >= 0) {
                            players[previousIndex].jPlayer("play");
                        }
                    });
                })({{$index}});
            @endforeach
        });

        function ask() {
            return confirm("Do you want to delete the music?");
        }
    </script>
</body>
</html>
