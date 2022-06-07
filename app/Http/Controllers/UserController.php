<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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
        $user->save();
        
        return response()->json([
            "status" => "Success"
        ], 200);
    }
    public function logIn(Request $request)
    {
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return response()->json(['error' => 'user not found.'], 401);
        }
        if (!Hash::check($request->password,$user->password)) {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
        else {
            return response()->json(['success' => 'success','id'=>$user->id,'name'=>$user->fname,'type'=>$user->type], 200);

        }
    }
}
