<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{

    public function ___construct()
    {
        $this->middleware('guest');
    }
    public function showLoginForm()
    {
        return view('admin.pass');
    }

    public function login()
    {
        if(! auth()->guard('admin')->attempt(request(['username','password'])))
        {
            return back()->withErrors([
                'message'=>'Unauthorized user'
            ]);
        }

        return redirect('/adminPanel');


    }

}
