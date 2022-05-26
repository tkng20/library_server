<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    //
    
    public $timestamps = false;
    protected $fillable = [
        'user_id','book_id','status','date_borrow','date_return','return_expect'
    ];

    public function book(){
        return $this->belongsTo(Book::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
