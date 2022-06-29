<?php


namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Home;
use Illuminate\Support\Facades\Http;
use Illuminate\Routing\Controller;
class ControllerHome extends Controller {

    public function home() {
        $session_id = session('userid');
        $user = User::find($session_id);
        if (!isset($user))
            return view('home'); //vedi meglio era view('welcome')
        
        return view("home")->with("user", $user);
    }

    function weather() { 
        $curl= curl_init();
        $endpoint='http://dataservice.accuweather.com/forecasts/v1/daily/1day/215605?apikey='.env('WEATHER_APIKEY').'&language=it&details=true';
       
        curl_setopt($curl,CURLOPT_URL,$endpoint);
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
       
        $res=curl_exec($curl);
        curl_close($curl);
        return $res;
    }

    function getHome(){
        $details= Home::all();
        return $details;
    }
}
?>