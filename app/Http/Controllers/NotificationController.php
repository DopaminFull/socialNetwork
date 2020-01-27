<?php

namespace App\Http\Controllers;

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
        $notifcations =  Notification::where('receiver', Auth::id())->orderBy('created_at', 'DESC')->get();
        foreach ($notifcations as $notifcation) {
            $notifcation->sender_name = User::find($notifcation->sender)->fullName();
        }
        return $notifcations;
    }
    public function mark_seen()
    {
        $notifcations =  Notification::where('receiver', Auth::id())->where('seen_at', null)->orderBy('created_at', 'DESC');
        $notifcations->update([
            "seen_at" => now()
        ]);
    }
}
