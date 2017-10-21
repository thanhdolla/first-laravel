<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khach_hang extends Model
{
    protected $table = "khach_hang";

    public function don_hang(){
        return $this->hasMany('App\Don_hang','khach_hangID','id');
    }
}
