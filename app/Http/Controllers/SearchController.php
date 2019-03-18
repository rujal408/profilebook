<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function searchFriend(Request $request){

        $search=$request->input('search');

        if(!$search){
            return redirect()->back();
        }
        $users=User::where(DB::raw("CONCAT(firstname,' ',lastname)"),'LIKE',"%{$search}%")
            ->orWhere('email','LIKE',"%{$search}%")
            ->get();

        return view('search.search')->with('users',$users);
    }
}
