<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use App\User;
use App\Notification;
class CommentController extends Controller
{
    public function createComment(Post $post){

        Comment::create([
            'comment'=>request('comment'),
            'post_id'=>$post->id,
            'user_id'=>auth()->id()
        ]);

        return redirect()->back();

    }

    public function showComment($id){
        $post=Post::findOrfail($id);
        $comment=$post->comments()->with('user')->get(); /* user is model where comment belongs to */
        return response()->json(array($comment));
    }
}
