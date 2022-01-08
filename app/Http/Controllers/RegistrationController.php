<?php

namespace App\Http\Controllers;

use App\Models\RegistrationModel;
use Illuminate\Http\Request;


class RegistrationController extends Controller
{
    //
    function OnRegister(Request $request){
        $firstname=$request->input('firstname');
        $lastname=$request->input('lastname');
        $city=$request->input('city');
        $username=$request->input('username');
        $password=$request->input('password');
        $gender=$request->input('gender');
        $userCount=RegistrationModel::where('username',$username)->count();
    
        if ($userCount!=0) {
            return "User Already Exists";
        }else {
            $result=RegistrationModel::insert([
                'firstname'=>$firstname,
                'lastname'=>$lastname,
                'city'=>$city,
                'username'=>$username,
                'password'=>$password,
                'gender'=>$gender
            ]);

            if ($request==true) {
                return "Registration succesful";
            }else {
                return "Registration Fail";
            }
        }

    }
}
