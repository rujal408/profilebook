<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Image;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Profile;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('home');
    }

    public function home(){

        return view('home');

    }

    public function homeProfile($id){
        $user=User::where('id',$id)->first();
        if(! $user)
        {
            abort(404);
        }
        $posts=Post::latest()->get();

        return view('profile.homeprofile',compact('user','posts'));

    }

    public function editProfile($id){
        $user=User::where('id',$id)->first();
        if(! $user)
        {
            abort(404);
        }
        if($user->id==auth()->user()->id){
        return view('profile.index')->with('user',$user);
        }
        else{
            return redirect('/'.$id);
        }
    }

    public function profilePic(Request $request){
        if($request->hasFile('avatar')){
            $avatar=$request->file('avatar');
            $filename=time() .'.'. $avatar->getClientOriginalExtension();

            Image::make($avatar)->resize(300,300)->save(public_path('images/'.$filename));
            $user=Auth::user();
            $user->avatar=$filename;
            $user->save();
        }

        return redirect()->back();
    }

    public function cropImage(){

    }



    public function editInfo($id){
        $user=User::where('id',$id)->first();

        return view('profile.editinfo',compact('user'));

    }

    public function updateInfo(Request $request){
       $user_id=Auth::user()->id;
       DB::table('profiles')->where('user_id',$user_id)->update($request->except('_token'));
       return redirect('/'.auth()->user()->id.'/editProfile');
    }

    public function editUser($id){
        return view('profile.edituser');
    }

    public function viewNotification($id){
        return view('notification.notifications');
    }

}