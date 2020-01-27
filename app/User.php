<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Auth;
use App\Http\Resources\SearchClient;
use App\Http\Resources\SearchCompany;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_id',  'client_company', 'avatar', 'sexe', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function client()
    {
        return $this->hasOne('App\Client', 'id', 'client_company');
    }
    public function company()
    {
        return $this->hasOne('App\Company', 'id', 'client_company');
    }

    public function isClient()
    {
        return $this->profile_id === 3;
    }

    public function isCompany()
    {
        return $this->profile_id === 2;
    }

    public function isAdmin()
    {
        return $this->profile_id === 1;
    }

    function isMe()
    {
        return $this->id === Auth::id();
    }

    public function fullName()
    {
        return $this->client->full_name;
    }
    public function picUrl()
    {
        return $this->client->picture_id;
    }
    public function profile()
    {
        return [
            1 => "user",
            2 => "company",
            3 => "user"
        ][$this->profile_id];
    }
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id');
    }
    public function follows($user)
    {
        return $this->followings->contains($user);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'poster', 'id');
    }
    public function searchClients($name, $limit = 3)
    {
        $clients = $this->whereHas('client', function ($q) use ($name) {
            $q->where('full_name', 'like', "$name%");
        })->take(
            $limit
        )->where('profile_id', 3)->take($limit)->get();
        //return $this->client->where('full_name', 'like', "$name%")->take($limit)->get();
        return SearchClient::collection($clients);
    }
    public function searchCompanies($name, $limit = 3)
    {
        $companies = $this->whereHas('company', function ($q) use ($name) {
            $q->where('sigle', 'like', "$name%");
        })->where('profile_id', 2)->take($limit)->get();
        return SearchCompany::collection($companies);
    }
}
