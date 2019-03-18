<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class FriendController extends Controller
{
    public function __construct()
    {
         return $this->middleware('auth');
    }

    public function getIndex()
    {
        $friends=auth()->user()->friends();
        $requests=auth()->user()->friendRequests();
        return view('friends.index')
            ->with('friends',$friends)
            ->with('requests',$requests);
    }

    public function getAdd($id){
        $user=User::where('id',$id)->first();
        if(!$user){
            return redirect()->back()->with('info','User could not be found.');
        }

        if(auth()->user()->hasFriendRequestPending($user)||$user->hasFriendRequestPending(auth()->user())){
            return redirect('/'.$user->id)
                /*->route('profile.homeprofile',['id'=>$user->id])*/
                ->with('info','Friend request already pending.');
        }

        if(auth()->user()->isFriendsWith($user)){
            return redirect('/'.$user->id)
               /* ->route('profile.homeprofile',['id'=>$user->id])*/
                ->with('info','You are already friends.');
        }

        auth()->user()->addFriend($user);

        return redirect('/'.$id)
            /*->route('profile.homeprofile',['id'=>$id])*/
            ->with('info','Friend request sent.');

    }

    public function getAccept($id){

        $user=User::where('id',$id)->first();
        if(!$user){
            return redirect()->back()->with('info','User could not be found.');
        }

        if(! auth()->user()->hasFriendRequestReceived($user)){
            return redirect()->back();
        }
        auth()->user()->acceptFriendRequest($user);

        return redirect('/'.$id)
           /* ->route('profile.homeprofile',['id'=>$id])*/
            ->with('info','Friend Request Accepted.');

    }

    public function getReject($id){

        $user=User::where('id',$id)->first();
        if(!$user){
            return redirect()->back()->with('info','User could not be found.');
        }

        if(! auth()->user()->hasFriendRequestReceived($user)){
            return redirect()->back();
        }

        auth()->user()->rejectFriendRequest($user);

        return redirect('/'.$id)
           /* ->route('profile.homeprofile',['id'=>$id])*/
            ->with('info','Friend Request rejected.');

    }

    public function getRemove($id){
        $user=User::where('id',$id)->first();
        if(!$user){
            return redirect()->back()->with('info','User could not be found.');
        }


        auth()->user()->removeFriend($user);

        return redirect('/'.$id)
            /*->route('profile.homeprofile',['id'=>$id])*/
            ->with('info','Friend request sent.');
    }

}
