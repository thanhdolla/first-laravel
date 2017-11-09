<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Binh_luan extends Model
{
    protected $table = 'comment';

    public function san_pham(){
        return $this->belongsTo('App\San_pham','san_phamID','id');
    }

    public function khach_hang(){
        return $this->belongsTo('App\Khach_hang','khach_hangID','id');
    }
}
