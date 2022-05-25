<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'tenTheLoai'
    ];

    public function book(){
        return $this->hasMany(Book::class);
    }
}
