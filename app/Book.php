<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
        public $timestamps = false;
        protected $fillable = [
            'tenSach', 'tacGia','categories_id','soLuong','soTrang','ngayXB','moTa'
        ];
    
        public function categories(){
            return $this->belongsTo(Categories::class);
        }
    
        public function borrow(){
            return $this->hasMany(Borrow::class);
        }
}
