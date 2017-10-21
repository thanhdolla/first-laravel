<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Don_hang_chi_tiet extends Model
{
    protected $table = "don_hang_chi_tiet";

    public function san_pham(){
        return $this->belongsTo('App\San_pham','san_phamID','id');
    }

    public function don_hang(){
        return $this->belongsTo('App\don_hang','don_hangID','id');
    }

}
