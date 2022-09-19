<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }


//    public function customLogin(Request $request)
//    {
//
//        $request->validate([
//            'email' => 'required',
//            'password' => 'required',
//        ]);
//
//        $credentials = $request->only('email', 'password');
//
//        $user = User::where('email',$credentials['email'])->get();
//
//
//        if (Auth::attempt($credentials)) {
// return  view('auth.app',['user'=>$user]);
////            return redirect()->intended('app')
////                ->withSuccess('Signed in');
//        }
//
//        return redirect("login")->withSuccess('Login details are not valid');
//    }
    public function customLogin(Request $request)
    {

        $request->validate([
            'user_name' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('user_name', 'password');

        $user = admin::where('user_name',$credentials['user_name'])->get();
        if(isset($user) && sizeof($user)>0){
            return redirect("news")->withSuccess('Login details are not valid');
        }

//        if (Auth::attempt($credentials)) {
//
//            return  view('auth.app',['user'=>$user]);
////            return redirect()->intended('app')
////                ->withSuccess('Signed in');
//        }

        return redirect("login")->withSuccess('Login details are not valid');
    }


    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("fa/login")->withSuccess('have signed-in');
    }


    public function create(array $data)
    {
        return admin::create([
            'user_name' => $data['user_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }

        return redirect("login")->withSuccess('are not allowed to access');
    }


    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('fa/login');
    }
}
