<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{
    //

    protected $connection = 'mongodb';
    protected $table = 'followers'; 


    protected $fillable = [
        'follower_id',
        'followed_id',
    ];


    public function follower()
    {
        return $this->belongsTo(related: User::class, foreignKey: 'follower_id');
    }
}
