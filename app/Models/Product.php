<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{
//ok
    public function reviews(){
        return $this->hasMany("App\Models\Review");
    }
 
    public function availableProducts(){
        return $this->hasMany("App\Models\availableProduct");
     }
 
    public function purchasedProducts(){
        return $this->belongsToMany("App\Models\Order",'purchased_products');
    }

    public function carts(){
        return $this->belongsToMany("App\Models\Cart");
    }

}
?>