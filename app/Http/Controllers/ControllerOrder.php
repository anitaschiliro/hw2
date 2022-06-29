<?php

 namespace App\Http\Controllers;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Database\Eloquent\Collection;
 use App\Models\Order;
 use Illuminate\Routing\Controller;
 use App\Models\User;
 use App\Models\Cart;

 class ControllerOrder extends Controller{

    public function order() {
      $session_id = session('userid');
      $user = User::find($session_id);
      if (!isset($user))
          return view('login');
      
      return view("order")->with("user", $user);
  }

   public function inviaOrdine(){
       $cart=Cart::where("user",session("userid"))->get();
       echo $cart; 
       $costo=0;
       foreach($cart as $c){
           $costo+=$c->prezzo;
       }
       $request=request();

       $indirizzo= "".$request['via']." ".$request['numciv'].", ".$request['citta'].", ".$request['cap']."";
       $spedizione=rand(0,100000);

       $ordine= new Order;
       $ordine->user=session("userid");
       $ordine->num_spedizione=$spedizione;
       $ordine->indirizzo=$indirizzo;
       $ordine->costo=$costo;
       $ordine->save();

       foreach($cart as $c){
        echo $c->codice;   
        DB::insert("INSERT into purchased_products (order_id,product_id,misura,quantita,costo) values ($ordine->id,$c->codice,'$c->misura',$c->quantita,$c->prezzo)");
        }
       $cart->each->delete();

       return redirect("profile");
   }
 }
?>