<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model{

    public $timestamps=false;
    ///sembra ok
    public function orders(){
        return $this->belongsTo("App\Models\Order");
    }

    public function products(){
        return $this->belongsTo("App\Models\Product");
    }

    public function users(){
        return $this->belongsTo("App\Models\User");
    }
}
?>