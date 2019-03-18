<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth:admin');
    }

    public function adminPanel()
    {
        return view('admin.layouts.home');
    }

    public function showUsers(){

        $users=User::all();
        return view('admin.listusers',compact('users'));

    }

    public function posts(){
        return view('admin.status');
    }

}
