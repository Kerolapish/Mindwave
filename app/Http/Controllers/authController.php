<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class authController extends Controller{
    
    //fucntion to handle user authentication (login)
    public function login(Request $request){

      //validating request posted through form
      $request->validate([
          'name' => 'required',
          'password' => 'required | min:7',
      ]);
      
      //getting data from request
      $credentials = $request->only('name', 'password');

      //check if the user's credentials are valid
      if (Auth::attempt($credentials)) {
          return redirect()->intended('admin/dashboard');
      }
      
      return redirect("login")->withErrors('Login details are not valid');
    }

    //function to handle user authentication (logout)
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
