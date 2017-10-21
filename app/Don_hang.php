<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Don_hang extends Model
{
    protected $table = "don_hang";

    public function don_hang(){
        return $this->hasMany('App\Don_hang_chi_tiet','Don_hang_ID','id');
    }

    public function khach_hang(){
        return $this->belongsTo('App\Khach_hang','khach_hangID','id');
    }
}
