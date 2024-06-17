<?php

namespace App\Http\Controllers;

use App\Models\Signup;
use App\Models\Album;
use App\Models\AddMusic;
use App\Models\Contact;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Crypt;



class MusicController extends Controller
{
    public function index()
    {
        return view('music.index');
    }
    // ********************************************
    // **********************************************

    public function master()
    {
        return view('music.master');
    }

    // ******************************************************
    // ******************************************************

    public function registration(Request $request)
    {

        $message = null;
        if ($request->user_id) {
            $user_id = trim($request->user_id);
            $password = trim($request->password);

            $is_valid = Signup::where('user_id', $user_id)->where('password', $password)->count();
            if ($is_valid > 0) {
                Session::put('user_id', $user_id);
                return redirect('/addmusic');
            } else {
                $message = "<font color=red>Invalid User Credential !</font>";
            }
        }
        
        return view('music.registration', compact('message'));
    }

    // **************************************************
    // **************************************************

    public function signup(Request $request)
    {
        $message = null;
        if ($request->has('name')) {
             $request->validate([
            'name'=>'required',
            'user_id'=>'required',
            'email'=>'required',
            'password'=>'required'
        ]);
            $name = trim($request->name);
            $userid = trim($request->user_id);
            $email = trim($request->email);
            $password = trim($request->password);


            $obj = new Signup();
            $obj->name = $name;
            $obj->user_id = $userid;
            $obj->email = $email;
            $obj->password = $password;

            $user = Signup::where('user_id', $userid)->where('password', $password)->first();
            // $request->session()->put('name' , $name);
            // Session::put('name' , $name);
            // Session::put('name', $user->name);

            $obj->save();
            return redirect('/registration');
        }
        return view('music.signup', compact('message'));
    }
    // *********************************************************
    // *********************************************************
    public function addalbum(Request $request)
    {
        if(Session::get('user_id'== null)){
            return redirect('/registration');
        }
        $message = null;
        if (isset($request->name)) {
            $albumname = trim($request->name);
            $user_id = Session::get('user_id');
            $cnt=Album::where('album_name',$albumname)->count();
			if($cnt > 0){
				$message="album is already exist";
            }else{
            $album = new Album();
            $album->user_id = $user_id;
            $album->album_name = $albumname;
    
            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
                if ($request->file('photo')->move(public_path('photos'), $photoName)) {
                    $album->photo = $photoName;
                } else {
                    $message = "Failed to upload the photo.";
                    return view('music.addmusic', compact('message'));
                }
            }
            
            // Save the album to the database
            $album->save();
            $message = "Your album is created";
        }
        }
        return view('music.addalbum', compact('message'));
    }
    
//    *************************************************
//    *************************************************

    public function addmusic(Request $request)
    {
        if(Session::get('user_id'== null)){
            return redirect('/registration');
        }
        $message = null;
    
        if (isset($request->album_id)) {

            $request->validate([
                'title'=>'required',
                'photo'=>'required|mimes:jpeg,jpg,png',
                'music'=>'required|mimes:mp3'
            ]);
            $addtitle = trim($request->title);
            $albumId = $request->input('album_id');
            $user_id = Session::get('user_id');
            $musicadd = new AddMusic();
            $musicadd->title = $addtitle;

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
                if ($request->file('photo')->move(public_path('photos'), $photoName)) {
                    $musicadd->photo = $photoName;
                } else {
                    // Handle error: Unable to move the uploaded photo file
                    $message = "Failed to upload the photo.";
                    return view('music.addmusic', compact('message'));
                }
            }
    
            // Upload and store the music file
            if ($request->hasFile('music') && $request->file('music')->isValid()) {
                $musicName = time() . '_' . $request->file('music')->getClientOriginalName();
                if ($request->file('music')->move(public_path('music'), $musicName)) {
                    $musicadd->musics = $musicName;
                } else {
                    // Handle error: Unable to move the uploaded music file
                    $message = "Failed to upload the music file.";
                    return view('music.addmusic', compact('message'));
                }
            }
    
            // Set the album ID
            $musicadd->albam_id = $albumId;
            $musicadd->user_id = $user_id;
    
            $musicadd->save();
            // Set a success message
            $message = "Music added successfully!";
        }
    
        // Redirect back to the form page with the message
        return view('music.addmusic', compact('message'));
    }

    // ***************************************************
    // ***************************************************

    public function list(){
        if(Session::get('user_id'== null)){
            return redirect('/registration');
        }
        $user_id= Session::get('user_id');
        $datas=Album::orderBy('album_name','asc')->where('user_id' , $user_id)->get();
        return view('music.musiclist',compact('datas'));
    } 

    // ****************************************************
    // **************************************************** 

    public function devide($id)
    {
        if(Session::get('user_id'== null)){
            return redirect('/registration');
        }
        $id=Crypt::decrypt($id);
        $separates = AddMusic::where('albam_id', $id)->get();
        return view('music.devide', compact('separates'));
    }
    // *****************************************************
    // *****************************************************

    public function edit_album($id, Request $request){
        if(Session::get('user_id'== null)){
            // Session::forgot('name');
            return redirect('/registration');
        }
        $id=Crypt::decrypt($id);
        $message=null;
        if(isset($request->name)){
            $albumname = trim($request->name);
            Album::where('id' , $id)->update([
               'album_name'=>$albumname
            ]);

            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
                
                // Move the uploaded photo to the destination directory
                if ($request->file('photo')->move(public_path('photos'), $photoName)) {
                    // Update the album with the new photo
                    Album::where('id' , $id)->update([
                        'photo' => $photoName
                    ]);
                    $message .= " Photo updated successfully.";
                } else {
                    $message .= " Failed to upload the photo.";
                }
            }
            $message = "data modified successfully";
        }
        $datas=Album::where('id', $id)->first();
        return view('music.edit_album', compact('datas','message'));
    }
    // ***********************************************************
    // **********************************************************

    public function musiclist(){
        if(Session::get('user_id'== '')){
            // Session::forgot('name');
            return redirect('/registration');
            }
        $user_id= Session::get('user_id');
        
        $datas=AddMusic::orderBy('title','asc')->where('user_id', $user_id)->paginate(10);
        return view('music.musiclist1',compact('datas'));
    } 

    // ****************************************************
    // ***************************************************

    public function edit_music($id , Request $request){
        if(Session::get('user_id'== null)){
            return redirect('/registration');
            }
        $id=Crypt::decrypt($id);
         $message = null;
         if(isset($request->album_id)){
            $albumid= $request->album_id;
            $title=$request->title;
            AddMusic::where('id' , $id)->update([
                'albam_id'=>$albumid,
                'title'=>$title
            ]);
            
            if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
                $photoName = time() . '_' . $request->file('photo')->getClientOriginalName();
                
                // Move the uploaded photo to the destination directory
                if ($request->file('photo')->move(public_path('photos'), $photoName)) {
                    // Update the album with the new photo
                    AddMusic::where('id' , $id)->update([
                        'photo' => $photoName
                    ]);
                    $message .= " Photo updated successfully.";
                } else {
                    $message .= " Failed to upload the photo.";
                }
            }

            if ($request->hasFile('music') && $request->file('music')->isValid()) {
                $music = time() . '_' . $request->file('music')->getClientOriginalName();
                
                // Move the uploaded photo to the destination directory
                if ($request->file('music')->move(public_path('music'), $music)) {
                    // Update the album with the new photo
                    AddMusic::where('id' , $id)->update([
                        'musics' => $music
                    ]);
                    $message .= " Photo updated successfully.";
                } else {
                    $message .= " Failed to upload the photo.";
                }
            }
            $message="data modified successfully";
         }
         $datas=AddMusic::where('id', $id)->first();
         return view('music.edit_music', compact('datas','message'));
    } 

    // **************************************************************

    public function delete($id){
        if(Session::get('user_id'== '')){
            return redirect('/registration');
            }
        $id=Crypt::decrypt($id);
         Album::where('id', $id)->delete();
         return redirect('/list');
    }


//     public function deleteMultiple(Request $request)
// {
//     $ids = $request->input('ids');
//     Album::whereIn('id', $ids)->delete();
//     return response()->json(['success' => true]);
// }
    // **************************************************************


    public function delete_music($id){
        if(Session::get('user_id'== null)){
            return redirect('/registration');
            }
        $id=Crypt::decrypt($id);
         AddMusic::where('id',$id)->delete();
         return redirect('/musiclist1');
    }

    // *************************************************************
    // *************************************************************

    public function forgotpassword(){
        return view('music.forgotpassword');
    }

    // *************************************************************
    // *************************************************************

    public function search(Request $request){
        if(Session::get('user_id'== null)){
            return redirect('/registration');
        }

        $data = $request->input('search');
        $datas= DB::table('addmusics')->where('title' , 'like' , '%'.$data.'%')->get();
       return view('music.musiclist1' , compact('datas'));
    }

    // ******************************************************

    public function layout(){
        return view('music.layout');
    }

    // *****************************************************


    public function search1(Request $request){
        if(Session::get('user_id') == null){
            return redirect('/registration');
        }
    
        $albumId = $request->album;
    
        // Retrieve the album name based on the provided ID
        $album = DB::table('album')->where('id', $albumId)->first();
        
        if ($album) {
            // Use the retrieved album name to perform the search query
            $albumName = $album->album_name;
            $datas = DB::table('album')->where('album_name', 'like', '%' . $albumName . '%')->get();
            
            return view('music.musiclist', compact('datas'));
        } else {
            // Handle case when no album is found for the given ID
            return redirect()->back()->with('error', 'Album not found.');
        }
    }

    // ************************************************
    public function navbar(){
        return view('music.navbar');
    }

    // ************************************************

    public function logout(){
        Session::put('user_id' , null);
        // Session::forgot('name');
        return redirect('/registration');
    }
    // **********************************

    public function contact(Request $request){
       $message=null;
       if(isset($request->name)){
        $name= $request->name;
        $email=$request->email;
        $phone=$request->phone;
        $message=$request->message;

        $obj=new Contact();
        $obj->name=$name;
        $obj->email=$email;
        $obj->phone=$phone;
        $obj->feedback=$message;
        $obj->save();
        $message="detail submitted";
       }
       return view('music.contact',compact('message'));
    }

    public function deletesongs(Request $request){
        $ids=$request->ids;
        AddMusic::whereIn('id' , $ids)->delete();
        return redirect()->back();
    }
  
}
