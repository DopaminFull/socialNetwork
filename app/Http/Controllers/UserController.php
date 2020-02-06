<?php

namespace App\Http\Controllers;

use App\User;
use App\Events\NewNotfication;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
     * AVATAR: upload/USER_<USERID>_<RANDOM_STRING>/AVATARS/<RANDOM_IMAGNAME>.<EXTENSION>
     */
    public function upload()
    {

        $user = auth()->user();
        $img = request('img');
        $extension = $img->extension();
        $type = request('type');
        $path = $user->upload_path;

        if ($type == 'avatar')
            $imgName = $user->hasAvatar() ? $user->avatar : Str::random(45) . ".$extension";
        elseif ($type == 'cover')
            $imgName = $user->hasCover() ? $user->cover   : Str::random(45) . ".$extension";

        /*if($type == 'avatar'){

            if($user->hasAvatar()){
                $oldAvatarArr = explode('/', $user->avatar);
                $path = "{$oldAvatarArr[0]}/{$oldAvatarArr[1]}/{$oldAvatarArr[2]}/";
                $imgName = $oldAvatarArr[3];
            }else{
                $extension = $img->extension();
                $imgName = Str::random(45).".".$extension;
            }

        }elseif($type == 'cover'){
            if($user->hasCover()){
                $oldAvatarArr = explode('/', $user->cover);
                $path = "{$oldAvatarArr[0]}/{$oldAvatarArr[1]}/{$oldAvatarArr[2]}/";
                $imgName = $oldAvatarArr[3];
            }else{
                $extension = $img->extension();
                $imgName = Str::random(45).".".$extension;
            }

        }*/

        // Finally update & upload the user's avatar/cover
        $img->move(public_path($path), $imgName);
        if ($type == 'avatar') {
            $user->avatar = $imgName;
            $user->save();
        } elseif ($type == 'cover') {
            //            $user->update(['avatar' => $imgName]);
            $user->cover = $imgName;
            $user->save();
        }
    }
}
