<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function posts()
    {
        #in case w7alt
        //     $followings_ids = auth()->user()->followings()->pluck('id')->toArray();
        // array_push($followings_ids, Auth::id());
        // return  Post::whereIn('poster', $followings_ids)->get();
        $posts = Post::whereIn('poster', auth()->user()->followings()->select('id')->get())->orderBy('created_at', 'DESC')->get();
        foreach ($posts as $post) {
            $post->poster_name = User::find($post->poster)->fullName();
            $post->created = $post->created_at->diffForHumans();
        }
        return $posts;
    }
    public function store(Request $request)
    {
        return Post::create([
            "poster" => Auth::id(),
            "body" => $request->body
        ]);
    }
}
