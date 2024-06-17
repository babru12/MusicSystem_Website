<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music List</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            /* padding: 20px; */
            color: #333;
        }

        h1 {
            text-align: center;
            color: #444;
            margin-bottom: 40px;
        }

        .music-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .music-card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 15px;
            padding: 15px;
            width: 300px;
            transition: transform 0.2s;
            text-align: center;
            position: relative;
        }

        .music-card:hover {
            transform: scale(1.05);
        }

        .music-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            cursor: pointer;
        }

        .music-card audio {
            width: 100%;
            margin-top: 10px;
        }

        .jp-progress {
            width: 100%;
            height: 5px;
            background-color: #ddd;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
            margin-top: 10px;
        }

        .jp-seek-bar {
            width: 100%;
            height: 100%;
        }

        .jp-play-bar {
            width: 0%;
            height: 100%;
            background-color: #007bff;
        }

        .jp-time-holder {
            font-size: 12px;
            color: #333;
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .jp-current-time, .jp-duration {
            margin: 0 5px;
        }

        .sound-effect {
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 100%;
            height: 30px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            opacity: 0;
        }

        .sound-effect div {
            width: 5px;
            height: 10px;
            background-color: #5ef3da;
            animation: bounce 0.5s infinite alternate;
            opacity: 0;
        }

        .sound-effect div:nth-child(1) { animation-delay: 0.1s; }
        .sound-effect div:nth-child(2) { animation-delay: 0.2s; }
        .sound-effect div:nth-child(3) { animation-delay: 0.3s; }
        .sound-effect div:nth-child(4) { animation-delay: 0.4s; }
        .sound-effect div:nth-child(5) { animation-delay: 0.5s; }
        .sound-effect div:nth-child(6) { animation-delay: 0.6s; }

        @keyframes bounce {
            to { height: 30px; opacity: 1; }
        }

        .playing .sound-effect {
            opacity: 1;
        }

        .controls {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        
        .controls i {
            color: #007bff;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .controls i:hover {
            color: #0056b3;
        }
        .box{
            background-color:black;
        }
        h2{
            text-align:center;
        }

    </style>
</head>
<body>
    @include('music.header2')
    <div class="box">
    <h1>Music List</h1>
    <div class="music-container">
        <?php $i = 0; ?>
        @foreach($separates as $separate)
            <div class="music-card" id="music-card-{{ $i }}">
                <img src="{{ url('/') }}/photos/{{ $separate->photo }}" alt="{{ $separate->title }}" onclick="playSong({{ ++$i }});">
                <audio id="audio{{ $i }}" controls>
                    <source src="{{ url('/') }}/music/{{ $separate->musics }}" type="audio/mpeg">
                    Your browser does not support the audio element.
                </audio>
                <div class="jp-time-holder">
                    <span class="jp-current-time">00:00</span>
                    <span class="jp-duration">00:00</span>
                </div>
                <div class="jp-progress">
                    <div class="jp-seek-bar">
                        <div class="jp-play-bar"></div>
                    </div>
                </div>
                <div class="controls">
                    <i class="fas fa-backward" onclick="prevSong({{ $i }});"></i>
                    <i class="fas fa-forward" onclick="nextSong({{ $i }});"></i>
                </div>
                <div class="sound-effect">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
            </div>
        @endforeach
    </div>
    </div>

    <script>
        var currentSongIndex = 1;

        function playSong(index) {
            // Pause all other audios and remove playing class
            document.querySelectorAll('audio').forEach(audio => {
                if (audio.id !== 'audio' + index) {
                    audio.pause();
                    audio.currentTime = 0; // Reset current time
                    audio.closest('.music-card').classList.remove('playing');
                }
            });

            // Play the selected audio and add playing class
            var audio = document.getElementById('audio' + index);
            currentSongIndex = index;
            if (audio.paused) {
                audio.play();
                audio.closest('.music-card').classList.add('playing');
            } else {
                audio.pause();
                audio.closest('.music-card').classList.remove('playing');
            }

            // Add event listener to remove playing class when audio ends
            audio.addEventListener('ended', function() {
                audio.closest('.music-card').classList.remove('playing');
                nextSong(currentSongIndex);
            });

            // Update progress bar and time
            audio.addEventListener('timeupdate', function() {
                var currentTime = audio.currentTime;
                var duration = audio.duration;
                var progressBar = audio.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild;
                var currentTimeElement = audio.nextElementSibling.firstElementChild;
                var durationElement = audio.nextElementSibling.lastElementChild;

                if (!isNaN(duration)) {
                    progressBar.style.width = (currentTime / duration) * 100 + '%';

                    var currentMinutes = Math.floor(currentTime / 60);
                    var currentSeconds = Math.floor(currentTime % 60);
                    var durationMinutes = Math.floor(duration / 60);
                    var durationSeconds = Math.floor(duration % 60);

                    currentTimeElement.textContent = (currentMinutes < 10 ? '0' : '') + currentMinutes + ':' + (currentSeconds < 10 ? '0' : '') + currentSeconds;
                    durationElement.textContent = (durationMinutes < 10 ? '0' : '') + durationMinutes + ':' + (durationSeconds < 10 ? '0' : '') + durationSeconds;
                }
            });
        }

        function nextSong(index) {
            var nextIndex = index + 1;
            if (document.getElementById('audio' + nextIndex)) {
                playSong(nextIndex);
            } else {
                playSong(1); // Go to first song if at the end
            }
        }

        function prevSong(index) {
            var prevIndex = index - 1;
            if (document.getElementById('audio' + prevIndex)) {
                playSong(prevIndex);
            } else {
                var lastIndex = document.querySelectorAll('audio').length;
                playSong(lastIndex); // Go to last song if at the beginning
            }
        }
    </script>
</body>
</html>
