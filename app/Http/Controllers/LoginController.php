<?php

namespace App\Http\Controllers;

use Firebase\JWT\JWT;

use Illuminate\Http\Request;
use App\Models\RegistrationModel;


class LoginController extends Controller
{

    // function TokenTest(){
    //     return "Token is OK";
    // }
    public function onLogin(Request $request){
        
        
        
        $username=$request->input('username');
        $password=$request->input('password');
        $userCount=RegistrationModel::where(['username'=>$username,'password'=>$password])->count();
       // return $userCount;
        if ($userCount==1) {
            $key=env('TOKEN_KEY');
            $payload = array(
                "site" => "http://demo.com",
                "user" => $username,
                "iat" => time(),
                "exp" => time()+300
            );

            $jwt = JWT::encode($payload, $key);
            //return $jwt;
            return response()->json(['Token'=>$jwt,'Status'=>'Login Success!!']);
        }else {
            return "Wrong username or password!";
        }
    }
}
