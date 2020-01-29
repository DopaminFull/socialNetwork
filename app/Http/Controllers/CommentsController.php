<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\NewNotfication;
use App\Http\Resources\CommentsResource;

class CommentsController extends Controller
{
    public function index(Post $post)
    {
        return CommentsResource::collection($post->comments()->offset(request('offset') ? request('offset') : 0)->take(3)->orderBy('created_at', 'desc')->get());
    }
    public function store()
    {

        $comment = Comment::create([
            'body' => \request()->body,
            'user_id' => Auth::id(),
            'post_id' => \request()->post
        ]);
        if ($comment->post->poster != Auth::id()) {
            broadcast(new NewNotfication(Notification::create([
                'sender' => Auth::id(),
                'receiver' => Post::find($comment->post_id)->poster,
                'body' => "commented to your post"
            ])))->toOthers();
        }
        return new CommentsResource($comment);
    }
}
