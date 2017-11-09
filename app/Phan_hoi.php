<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phan_hoi extends Model
{
    protected $table = "phan_hoi";
    public function khach_hang(){
        return $this->belongsTo('App\Khach_hang','khach_hangID','id');
    }
}
