<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model{

    public $timestamps=false;
    public function reviews(){
        return $this->hasMany("App\Models\Review");
    }

    public function purchasedProducts(){
        return $this->belongsToMany("App\Models\Product",'purchased_products');
    }

    public function users(){
        return $this->belongsTo("App\Models\User");
    }
}
?>