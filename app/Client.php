<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['full_name', 'current_profession', 'previous_profession', 'tele', 'gender'];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
