<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function __construct()
    {
         $this->middleware('auth');
    }

    public function postStatus(){
        Post::create([
            'status'=>request('status'),
            'user_id'=>auth()->id()
        ]);

        return redirect()->back();
    }

}
