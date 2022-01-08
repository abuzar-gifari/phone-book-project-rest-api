<?php

namespace App\Http\Controllers;

use App\Models\PhoneBookModel;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
    function OnInsert(Request $request){
        
        $token=$request->input('access_token');
        $key=env('TOKEN_KEY');

        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array=(array)$decoded;
        $user=$decoded_array['user'];
        
        $one=$request->input('phone_number_one');
        $two=$request->input('phone_number_two');
        $name=$request->input('name');
        $email=$request->input('email');
    
        $result=PhoneBookModel::insert([
            'username'=>$user,
            'phone_number_one'=>$one,
            'phone_number_two'=>$two,
            'name'=>$name,
            'email'=>$email
        ]);

        if ($result==true) {
            return "Succesfully Added";
        }else {
            return "Fail to add";
        }

    }


    function OnSelect(Request $request){
             
        $token=$request->input('access_token');
        $key=env('TOKEN_KEY');

        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array=(array)$decoded;
        $user=$decoded_array['user'];

        $result=PhoneBookModel::where('username',$user)->get();
        return $result;
    }

    function OnDelete(Request $request){

        $email=$request->input('email');       
        $token=$request->input('access_token');
        $key=env('TOKEN_KEY');

        $decoded = JWT::decode($token, $key, array('HS256'));
        $decoded_array=(array)$decoded;
        $user=$decoded_array['user'];
        $result=PhoneBookModel::where(['username'=>$user,'email'=>$email])->delete();

        if ($result==true) {
            return 'delete succesfully';
        }else {
            return "Delete Fail, try again";
        }
    }


}
