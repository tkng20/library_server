<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'tenSach', 'tacGia','theLoai','soLuong','soTrang','ngayXB','moTa'
    ];

    public function borrow(){
        return $this->hasMany(Borrow::class);
    }
}
