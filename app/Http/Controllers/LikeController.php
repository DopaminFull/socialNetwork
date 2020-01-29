<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\NewNotfication;
use App\Notification;

class LikeController extends Controller
{
    public function Like()
    {
        Like::create([
            'post_id' => request('post'),
            'user_id' => Auth::id()
        ]);
        if (Post::find(request('post'))->poster != Auth::id()) {
            broadcast(new NewNotfication(Notification::create([
                'sender' => Auth::id(),
                'receiver' => Post::find(request('post'))->poster,
                'body' => "liked your post"
            ])))->toOthers();
        }
    }
    public function unlike()
    {
         Post::find(request('post'))->likes()->where('user_id', Auth::id())
        ->where('post_id',request('post'))
        ->first()->delete();
      
      
    }
}
