<?php

 namespace App\Http\Controllers;
 use Illuminate\Routing\Controller;
 use App\Models\User;
 use App\Models\Order;
 use App\Models\Product;
 use App\Models\Review;
 use Illuminate\Support\Facades\DB;

 class ControllerProfile extends Controller{

    public function profile() {
      $session_id = session('userid');
      $user = User::find($session_id);
      if (!isset($user))
          return view('login');
      
      return view("profile")->with("user", $user);
  }

  public function ordini(){
    $session_id = session('userid');
    $ordini=Order::where("user",$session_id)->orderBy('id', 'DESC')->get();
    return response()->json($ordini);
  }

  public function articoli($id){
      $articoli=DB::select("SELECT * from products join purchased_products 
      where purchased_products.product_id=products.id and
      purchased_products.order_id=?",[$id]);
      /*$order=Order::find($id);
      $articoli= $order->purchasedProducts()->get();*/
      return response()->json($articoli);
  }

  public function aggiornaRecensioni($art,$ord){
    $id=session("userid");
    $user=User::where("id","=",$id)->first();
    $rec=Review::where("articolo","=",$art)->where("ordine","=",$ord)->where("user","=",$id)->first();
    $recensione=$rec->recensione;
    $username=$user->username;
    $array[]=array("ordine"=>$ord,"articolo"=>$art,"username"=>$username,"recensione"=>$recensione);
    return response()->json($array);
  }

  public function eliminaRecensione($art,$ord){
    $id=session("userid");
    $r=Review::where("ordine","=",$ord)->where("articolo","=",$art)->where("user","=",$id)->get();
    $r->each->delete();
  }

  public function caricaRecensione($rec,$art,$ord){
    $id=session("userid");
    $verifica=Review::where("ordine","=",$ord)->where("articolo","=",$art)->where("user","=",$id)->exists();
    if($verifica){
      $array[]=array('success'=>false,'ordine'=>$ord,'articolo'=>$art);
      return response()->json($array);
    }else{
      $newRec= new Review;
      $newRec->ordine=$ord;
      $newRec->articolo=$art;
      $newRec->user=session("userid");
      $newRec->recensione=$rec;
      $newRec->save();
      $array[]=array('success'=>true,'ordine'=>$ord,'articolo'=>$art);
      return response()->json($array);
    }
  }
 }
?>