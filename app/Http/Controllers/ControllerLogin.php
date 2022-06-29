<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ControllerLogin extends Controller {

    public function login() {
        if(session('userid') != null) {
            return redirect("home");
        }
        else {
            return view('login')
            ->with('csrf_token', csrf_token());
        }
     }

     public function checkLogin() {
         $user = User::where('username', request('username'))->first();

         $ok=Hash::check(request('password'),$user->pwd);
         if($user !== null && $ok) {
             Session::put('userid', $user->id);
             return redirect('home');
         }
         else {
            return redirect('login')->withInput();
         }
     }

     public function logout() {
         Session::flush();
         return redirect('login');
     }
}
?>