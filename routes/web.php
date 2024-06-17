<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MusicController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::any('/login',[MusicController::class,'login']);

Route::any('/registration',[MusicController::class, 'registration']);
Route::any('/index',[MusicController::class , 'index']);
Route::any('/master',[MusicController::class , 'master']);
Route::any('/signup',[MusicController::class , 'signup']);
Route::any('/audio',[MusicController::class , 'audio']);
Route::any('/addalbum',[MusicController::class , 'addalbum']);
Route::any('/addmusic',[MusicController::class,'addmusic']);
Route::any('/list',[MusicController::class , 'list']);
Route::any('/musiclist1',[MusicController::class,'musiclist']);
Route::any('/load_song/{id}',[MusicController::class , 'load_song']);
Route::any('/devide/{id}',[MusicController::class , 'devide']);
Route::any('/edit_album/{id}',[MusicController::class , 'edit_album']);
Route::any('/edit_music/{id}',[MusicController::class , 'edit_music']);
Route::any('/delete/{id}',[MusicController::class , 'delete']);
// Route::post('/delete-multiple/{id}', [MusicController::class, 'deleteMultiple']);

Route::any('/delete_music/{id}',[MusicController::class,'delete_music']);
Route::any('/forgotpassword',[MusicController::class,'forgotpassword']);
Route::get('search', [MusicController::class , 'search']);
Route::get('search1', [MusicController::class , 'search1']);

Route::get('/layout',[MusicController::class,'layout']);

Route::get('/get-all-session' , function(){
    $session=session()->all();
    echo "<pre>";
    print_r($session);
});
// Route::get('set-session',function(Request $request){
//       $request->session()->put('username' , "babru");
// });
Route::get('/test-session', function () {
    Session::put('name', 'Test Name');
    return redirect('/show-session');
});

Route::get('/destroy-session', function () {
    Session::forget('name'); // Corrected from Session::forgot('name')
    return redirect('/show-session');
});

Route::get('/show-session', function (Request $request) {
    $sessionData = $request->session()->all();
    return response()->json($sessionData);
});

Route::any('/navbar',[MusicController::class,'navbar']);

Route::any('/logout',[MusicController::class,'logout']);

Route::any('/contact',[MusicController::class, 'contact']);

Route::any('/navbar',function(){
    return view('music.navbar');
});

Route::any('/delete_songs',[MusicController::class,'deletesongs']);

