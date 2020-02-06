<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResource;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAll()
    {
        return NotificationResource::collection(Notification::where('receiver', Auth::id())->orderBy('created_at', 'DESC')->take(5)->get());
    }
    public function mark_seen()
    {
        $notifcations =  Notification::where('receiver', Auth::id())->where('seen_at', null)->orderBy('created_at', 'DESC');
        $notifcations->update([
            "seen_at" => now()
        ]);
    }
}
