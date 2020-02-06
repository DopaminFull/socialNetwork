<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function posts()
    {
        return PostResource::collection(Post::whereIn('poster', Auth::user()->followings()->pluck('id')->toArray())->orWhere('poster', Auth::id())->orderBy('created_at', 'DESC')->get());
    }
    public function store(Request $request)
    {
        return new PostResource(
            Post::create([
                "poster" => Auth::id(),
                "body" => $request->body
            ])
        );
    }
}
