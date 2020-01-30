<?php

namespace App\Http\Controllers;

use App\User;
use App\Events\NewNotfication;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

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

    /**
     * Remember the pattern of uploading AVATARS or POSTS:
     * Pattern USER_<ID>_<RANDOM_STRING> / [AVATARS | POSTS] / <>
     * AVATAR: upload/USER_<USERID>_<RANDOM_STRING>/AVATARS/<IMAGNAME>.<EXTENSION>
     */
    public function upload(){
        $user = auth();
        $img = request('img');
        $extension = $img->extension();
        $imgName = Str::random(45).".".$extension;
        if($user->user()->hasAvatar()){
            $oldAvatarArr = explode('/', $user->user()->avatar);
            $avatarPath = "{$oldAvatarArr[0]}/{$oldAvatarArr[1]}/{$oldAvatarArr[2]}/";
            request('img')->move(public_path($avatarPath), $oldAvatarArr[3]);
        }

        $path = "uploads/USER_".$user->id()."_".Str::random(5)."/AVATARS/";
        $user->user()->update(['avatar' => $path.$imgName]);
    }
}
