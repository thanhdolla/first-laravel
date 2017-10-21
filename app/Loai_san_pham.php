<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loai_san_pham extends Model
{
    protected $table = "loai_san_pham";

    public function san_pham(){
        return $this->hasMany('App\San_pham','loai_spID','id');
    }



}
