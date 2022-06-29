<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\availableProduct;
use Illuminate\Routing\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Review;
use App\Models\Cart;

class ControllerShop extends Controller {

    public function shop() {
        $session_id = session('userid');
        $user = User::find($session_id);
        if (!isset($user))
            return view('shop'); //vedi meglio era view('welcome')
        
        return view("shop")->with("user", $user);
    }

    public function getReview($art){
        $results=Review::where("articolo",$art)->get();

        $reviews=array();

        foreach($results as $result){
            $user = User::find($result->user);
            $reviews[]=array(
                "articolo"=>$result->articolo,
                "recensione"=> $result->recensione,
                "username"=> $user->username
            );
        }
        return response()->json($reviews);
    }

    public function misura($art){
        $misure= availableProduct::where("codice",$art)->get();
        return response()->json($misure);
    
    }

    public function search($q){
        $found= Product::where("descrizione","like","%".$q."%")->orWhere("id","like","%".$q."%")->get();
        return response()->json($found);
    }

    public function getProducts(){
        $products=Product::all();

        return response()->json($products);
    }

    public function aggiungiCarrello($art,$misura){
        $userid=session("userid");
        $verifica=Cart::where("codice",$art)->where("misura",$misura)->where("user",$userid)->exists();

        if($verifica){
           DB::update("UPDATE carts SET quantita=quantita+1 where codice=$art and misura='$misura' and user=$userid");
        }else{
            $articolo=DB::table("products")
            ->join("available_products","products.id","=","available_products.codice")
            ->where("available_products.misura","=",$misura)
            ->where("products.id","=",$art)
            ->first();
            $cart= new Cart;
            $cart->user= $userid;
            $cart->codice=$articolo->codice;
            $cart->descrizione=$articolo->descrizione;
            $cart->marca= $articolo->marca;
            $cart->prezzo=$articolo->prezzo;
            $cart->image=$articolo->image;
            $cart->misura=$articolo->misura;
            $cart->quantita=1;
            $cart->save();
        }
    }
}
?>