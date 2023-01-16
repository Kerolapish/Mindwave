<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class actionController extends Controller{

    // function to direct user to login page
    public function loginPage (){
        return view('/admin/loginPage');
    }
    
    // function to direct user to register page
    public function registerPage (){
        return view('/admin/registerPage');
    }

    // function to direct user to admin dashboard
    public function dashboard(){
        return view('/admin/dashboard');
    }
}
