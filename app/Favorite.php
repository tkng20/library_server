<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'user_id','book_id'
    ];

    public function favorited(){
        return $this->belongsToMany(User::class);
    }
}
