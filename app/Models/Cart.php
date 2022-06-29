<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model{

    public function products(){
        return $this->belongsToMany("App\Models\Product");//ok
    }

    public function users(){
        return $this->belongsTo("App\Models\User");//giusto
    }
}
?>