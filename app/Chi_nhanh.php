<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chi_nhanh extends Model
{
    protected $table = 'chi_nhanh';
    public function san_pham(){
        return $this->hasMany('App\San_pham','Chi_nhanh','id');
    }
}
