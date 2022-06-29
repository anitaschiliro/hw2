<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class availableProduct extends Model{

    public function products(){
       return $this->belongsTo("App\Models\Product");
    }

}
?>