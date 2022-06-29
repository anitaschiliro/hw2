<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ControllerSignin extends Controller {


    protected function newUser()
    {
        $request = request();

        if($this->countErrors($request) === 0) {
            $newUser =new User;
            $newUser->username=$request['username'];
            $newUser->email=$request['email'];
            $newUser->pwd= Hash::make($request['password']);
            $newUser->nome=$request['nome'];
            $newUser->cognome=$request['cognome'];
            $newUser->save();
            if ($newUser) {
                Session::put('userid', $newUser->id);
                return redirect('home')->with("user",$newUser);
            } 
            else {
                return redirect('signin')->withInput();
            }
        }
        else 
            return redirect('signin')->withInput(); 
    }

    private function countErrors($data) {
        $error = array();
        
        # USERNAME
        // Controlla che l'username rispetti il pattern specificato
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $data['username'])) {
            $error[] = "Username non valido";
        } else {
            $username = User::where('username', $data['username'])->first();
            if ($username !== null) {
                $error[] = "Username già utilizzato";
            }
        }
        # PASSWORD
        if (strlen($data["password"]) < 8) {
            $error[] = "Caratteri password insufficienti";
        } 
        # CONFERMA PASSWORD
        if (strcmp($data["password"], $data["confpassword"]) != 0) {
            $error[] = "Le password non coincidono";
        }
        # EMAIL
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = "Email non valida";
        } else {
            $email = User::where('email', $data['email'])->first();
            if ($email !== null) {
                $error[] = "Email già utilizzata";
            }
        }

        return count($error);
    }

    public function checkUsername($query) {
        $exist = User::where('username', $query)->exists();
        return ['exists' => $exist];
    }

    public function checkEmail($query) {
        $exist = User::where('email', $query)->exists();
        return ['exists' => $exist];
    }

    public function signin() {
        return view('signin');
    } 
}
?>