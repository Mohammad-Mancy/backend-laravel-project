<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function signUp(Request $request){
        $user = new User;
        $user->fname=$request->fname;
        $user->lname=$request->lname;
        $user->email=$request->email;
        $hashPassword = $request->password;
        $user->password=Hash::make($hashPassword);
        $user->gender=$request->gender;
        $user->phone_number=$request->phone_number;
        $user->type='user';
        // $user=array();
        // $user['first_name']=$request->first_name;
        // $user['last_name']=$request->last_name;
        // $user['email']=$request->email;
        // $user['password']=$request->password;
        // $user['gender']=$request->gender;
        // $user['phone_number']=$request->phone_number;
        // $user['type']='user';
        $user->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }
}
