<?php

 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Http;
 use Illuminate\Validation\Rule;
 use Illuminate\Routing\Controller;
 use App\Models\User;
 use App\Models\Cart;

 class ControllerCart extends Controller{

    public function update(){
      $user_id=session('userid');
      $rows=Cart::where("user",$user_id)->get();
      $cartArray=array();

      foreach($rows as $row){
        $cartArray[]=array(
          'codice'=>$row->codice,
          'descrizione'=>$row->descrizione,
          'marca'=>$row->marca,
          'prezzo'=>$row->prezzo,
          'immagine'=>$row->image,
          'misura'=>$row->misura,
          'quantita'=>$row->quantita
        );
      }
      return response()->json($cartArray);

    }

    public function delete($art){
      $user=session('userid');
      $product=Cart::where("user",$user)->where("codice",$art);
      $product->delete();
    }

    public function cart() {
      $session_id = session('userid');
      $user = User::find($session_id);
      if (!isset($user))
          return view('login');
      
      return view("cart")->with("user", $user);
  }
 }
?>