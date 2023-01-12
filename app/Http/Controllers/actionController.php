<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class actionController extends Controller
{
    //function to go to ConsultationPage.php
        //Function to go to update member page at student admin
        public function StudentUpdateView($id){
            return view('ConsultationPage');
        }
}
