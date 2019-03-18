<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('signOut');
    }

    public function register(Request $request){

        $this->validate($request, [
            'firstname' => 'required',
            'lastname'=>'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ]);

        $user= User::create([
            'firstname'=>request('firstname'),
            'lastname'=>request('lastname'),
            'email'=>request('email'),
            'password'=>bcrypt(request('password'))
        ]);

        $user->prof();

        auth()->login($user);

        return redirect('/'.auth()->user()->id);

    }

    public function signIn(){

        if(! auth()->attempt(request(['email','password'])))
        {
            return back()->withErrors([
                'message'=>'Email or Password invalid'
            ]);
        }

        return redirect('/'.auth()->user()->id);
    }

    public function signOut(){
        auth()->logout();
        return redirect()->home();
    }
}
