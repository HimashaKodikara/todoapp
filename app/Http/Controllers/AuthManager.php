<?php

namespace App\Http\Controllers;

use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthManager extends Controller
{

    public function login()
    {
        return view('auth.login');

    }
    public function loginPost(Request $request)
    {
        dd($request);
      $request->validate([
        'email' => 'required',
        'password' => 'required',
      ]);
      $credentials = $request->only('email','password');
      if(Auth::attempt($credentials)){
        return redirect()->intended(route("home"));
      }
      return redirect(route("login"))
       ->with("error","Invalis Email or Password");
    }
    public function register()
    {
        return view('auth.register');
    }
    public function registerPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = new User();

       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = $request->password;

       if($user->save()){
        return redirect(route("login"))
        ->with("success","Registration Succesfull");
       }
       return redirect(route("regitser"))
       ->with("error","Registeration Failed");
    }
}
