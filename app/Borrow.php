<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    //
    // edit and save
    public $timestamps = false;
    protected $fillable = [
        'user_id','book_id','status','date_borrow','date_return'
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}