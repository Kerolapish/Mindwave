<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;

class actionController extends Controller{

    //function to direct user to mainpage of the website
    public function index(){
        $brandData = brand::find(1);
        return view('HomePage' , compact('brandData'));
    }
    // function to direct user to login page
    public function loginPage (){
        return view('/admin/loginPage');
    }
    
    // function to direct user to register page
    public function registerPage (){
        return view('/admin/registerPage');
    }

    //function to direct user to unauthorize page
    public function unathorizeError(){
        return view('/error/unauthorize');
    }

    // function to direct user to admin dashboard
    public function dashboard(){
        return view('/admin/dashboard');
    }

    //function to direct user to branding page
    public function branding(){
        $brandData = brand::find(1);
        return view('admin/pages/branding' , compact('brandData'));
    }
    
    //function to update siteName (Branding)
    public function updateSiteName(Request $request){
        
        //select row and save the data requested
        $row = brand::find(1);
        $row -> siteName = $request -> name;
        $row -> save();

        $brandData = brand::find(1);
        return redirect()->back()->with([
            'success'=>  'Form submitted successfully.',
            'brandData'
        ]);
    }
}
