<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class authController extends Controller{
    
    //function to validate registration request posted form 
    public function registration(Request $request){

      //validating request posted through form
        $request->validate([
            'username' => 'required',
            'email' => 'email',
            'password' => 'required | confirmed | min:7'
        ]);

        //getting data from request
        $data = $request->all();

        //passing data as argument to create method
        $check = $this->create($data);
        return redirect("admin/dashboard");
    }


    //function to create new record of user in DB
    public function create(array $data){
      
      return $user = User::create([
        
        'name' => $data['username'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);

    }

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
}
