<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class San_pham extends Model
{
    protected $table = "san_pham";

    public function loai_san_pham(){
        return $this->belongsTo('App\Loai_san_pham','loai_spID','id');//id cua bang loai_sp
    }
    public function hang_san_pham(){
        return $this->belongsTo('App\Loai_san_pham','hang_spID','hang_spID');//id cua bang loai_sp
    }


    public function don_hang_chi_tiet(){
        return $this->hasMany('App\Don_hang_chi_tiet','san_phamID','id');
    }
}
