<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album List</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .album-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .album-card {
            background-color: black;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            width: 300px;
        }

        .album-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .album-photo {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .album-details {
            padding: 20px;
        }

        .album-details h2 {
            margin: 0;
            font-size: 1.5em;
            color: white;
        }

        .album-actions {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
        }

        .album-actions a {
            color: #fff;
            text-decoration: none;
            font-size: 1em;
            transition: color 0.3s;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .edit-button {
            background-color: #28a745;
            border: 1px solid #28a745;
        }

        .edit-button:hover {
            background-color: #218838;
        }

        .delete-button {
            background-color: #dc3545;
            border: 1px solid #dc3545;
        }

        .delete-button:hover {
            background-color: #c82333;
        }

        #delete-selected {
            padding: 10px 20px;
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 1em;
        }

        #delete-selected:hover {
            background-color: #c82333;
        }

        /* Drop-down styles */
        .search-form {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    margin-bottom: 20px;
}

.search-form select {
    margin-top:30px;
    padding: 12px;
    border: 1px solid #ddd;
    border-radius: 5px;
    width: 450px;
    background-color: #fff;
    font-size: 16px;
    transition: border-color 0.3s, box-shadow 0.3s;
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url('data:image/svg+xml;charset=US-ASCII,%3Csvg xmlns%3D%27http://www.w3.org/2000/svg%27 width%3D%2716%27 height%3D%2716%27 fill%3D%27%23000%27 class%3D%27bi bi-caret-down-fill%27 viewBox%3D%270 0 16 16%27%3E%3Cpath d%3D%27M7.247 11.14 2.451 5.658c-.566-.626-.106-1.658.747-1.658h9.604c.853 0 1.313 1.032.747 1.658l-4.796 5.482a1 1 0 0 1-1.508 0z%27/%3E%3C/svg%3E');
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 12px 12px;
}

.search-form select:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    outline: none;
}

.search-form button {
    margin-top:30px;
    padding: 12px 50px;
    background-color: #007bff;
    color: #fff;
    border: none;
    font-size: 16px;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease-out;
}

.search-form button:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    @include('music.header2')
    @include('music.banner')
    <form action="search1" method="GET" class="search-form">
        <?php
            $album = DB::select("select *from album");
        ?>
        <select name="album" id="album">
            <option value="" selected>select the album</option>
            @foreach($album as $albums)
                <option value="{{$albums->id}}">{{$albums->album_name}}</option>
            @endforeach
        </select>
        <button type="submit" class="btn">            <ion-icon name="search-outline"></ion-icon> Search
</button>
    </form>
    <div class="album-container">
        <?php $i=0; ?>

        @foreach($datas as $data)
        <?php
           $total = App\Models\AddMusic::where('albam_id', $data->id)->count();
        ?>
        <div class="album-card">
            <a href="{{url('/')}}/devide/{{Crypt::encrypt($data->id)}}"><img class="album-photo" src="{{ url('/') }}/photos/{{ $data->photo }}" alt="{{ $data->album_name }}"></a>
            <div class="album-details">
                <h2>{{ $data->album_name }}  ({{$total}}) </h2>
                <div class="album-actions">
                    <a href="{{url('/')}}/edit_album/{{Crypt::encrypt($data->id)}}" class="edit-button">Edit</a>
                    <a href="{{url('/')}}/delete/{{Crypt::encrypt($data->id)}}" onclick="return ask()" class="delete-button">Delete</a>
                </div>
            </div>
        </div>
        @endforeach
    </div><br><br><br><br><br>



    @include('music.footer');
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('audio').each(function() {
                if ($(this).get(0).canPlayType) {
                    var src = $(this).find('source').attr('src');
                    if (!src || src === '' || $(this).get(0).canPlayType('audio/mpeg') === '') {
                        $(this).replaceWith('<p>Audio not supported</p>');
                    }
                }
            });

            // Function to handle deletion
            $('#delete-selected').click(function() {
                var checkedItems = $('.delete-checkbox:checked').map(function() {
                    return $(this).val();
                }).get();
                
                if (checkedItems.length === 0) {
                    alert('Please select items to delete.');
                    return;
                }

                if (confirm('Are you sure you want to delete the selected items?')) {
                    // Perform AJAX request to delete the selected items
                    $.ajax({
                        url: '{{url('/')}}/delete-multiple',
                        type: 'POST',
                        data: { ids: checkedItems },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            // Refresh the page or update the UI as needed
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            // Handle errors
                            console.error(xhr.responseText);
                        }
                    });
                }
            });
        });

        function ask() {
            return confirm("Do you want to delete?");
        }
    </script>
</body>
</html>
