<?php

namespace App\Http\Controllers;

use App\Models\siteProperty;
use Illuminate\Http\Request;

class setupController extends Controller
{
    //function to go to branding form page
    public function createBranding(){
        $siteData = siteProperty::find(1);
        return view('admin/pages/branding', compact('siteData'));
    }
}
