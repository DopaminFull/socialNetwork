<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function Like()
    {
        Like::create([
            'post_id' => request()->post,
            'user_id' => Auth::id()
        ]);
    }
}
