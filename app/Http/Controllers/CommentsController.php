<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\User;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\NewNotfication;

class CommentsController extends Controller
{
    public function index(Post $post)
    {
        $comments = $post->comments()->offset(request('offset') ? request('offset') : 0)->take(3)->orderBy('created_at', 'desc')->get();
        foreach ($comments as $comment) {
            $comment->poster_name = User::find($comment->user_id)->fullName();
            $comment->created = $comment->created_at->diffForHumans();
        }
        return $comments;
    }
    public function store()
    {

        $comment = Comment::create([
            'body' => \request()->body,
            'user_id' => Auth::id(),
            'post_id' => \request()->post
        ]);
        $comment->poster_name = User::find($comment->user_id)->fullName();
        $comment->created = $comment->created_at->diffForHumans();
        broadcast(new NewNotfication(Notification::create([
            'sender' => Auth::id(),
            'receiver' => Post::find($comment->post_id)->poster,
            'body' => "has commented to your post"
        ])))->toOthers();
        return $comment;
    }
}
