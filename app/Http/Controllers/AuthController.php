<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function register(Request $request)
    {
    $validator=Validator::make($request->all(),[
        'user_name'=>'required',
        'email'=>'required|email',
        'password'=>'required'

    ]);
    if($validator->fail()){
        return response()->json(['status_code'=>400,'message'=>'Bad Request']);
    }
    $user=new admin();
    $user->user_name=$request->user_name;
    $user->email=$request->email;
    $user->password=bcrypt($request->password);
    $user->save();
    return  response()->json([
       'status_code'=>200,
        'message'=>'User created success'
    ]);

    }

    public function login(Request $request)
    {
        $validator=Validator::make($request->all(),[
            'user_name'=>'required',
            'password'=>'required'
        ]);

        if($validator->fail()){
            return response()->json(['status_code'=>400,'message'=>'Bad Request']);
        }
        $credentials=request(['user_name','password']);
        if(!Auth::attemp($credentials)){
            return response()->json([
               'status_code'=>500,
                'message'=>'Unauthorize'
            ]);

        }
     $user=admin::where('user_name',$request->user_name)->first();
     $tokenResult=$user->createToken('authToken')->plainTextToken;
     return response()->json([
         'status_code'=>200,
         'token'=>$tokenResult
     ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'status_code'=>200,
            'message'=>'Token deleted'
        ]);

    }
}
