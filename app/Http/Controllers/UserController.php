<?php

namespace App\Http\Controllers;

use App\User;
use App\Events\NewNotfication;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{

    public $Me;
    public function __construct()
    { }
    public function follow($id)
    {
        auth()->user()->followings()->attach($id);
        broadcast(new NewNotfication(Notification::create([
            'sender' => Auth::id(),
            'receiver' => $id,
            'body' => "is following you now"
        ])))->toOthers();
    }
    public function unfollow($id)
    {
        auth()->user()->followings()->detach($id);
    }
}
