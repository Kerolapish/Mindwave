<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Models\siteProperty;
use Illuminate\Http\Request;

class setupController extends Controller
{
    //function to go to branding form page
    public function createBranding()
    {
        $siteData = siteProperty::find(1);
        return view('admin/pages/branding', compact('siteData'));
    }

    //function to go to service form page
    public function createService()
    {
        $siteData = siteProperty::find(1);
        $serviceData = service::all();
        return view('admin/pages/service', compact('siteData', 'serviceData'));
    }

    //function to add new row to service
    public function addService(Request $request, $id)
    {

        //validate data from request
        $validateData = $request->validate([
            'title' => 'required',
            'paragraph' => 'required'
        ]);

        //create new row and save data from request
        $service = new service;
        $service -> title = $validateData['title'];
        $service -> desc = $validateData['paragraph'];
        $service -> save();

        //get data from db
        $siteData = siteProperty::find(1);
        $serviceData = service::all();

        //check if service row have 6 row
        if($serviceData -> count() == 6){
            $site = siteProperty::find(1);
            $site -> setupService = true;
            $site -> save();
        }

        return redirect()->back()->with([
            'serviceData' => $serviceData,
            'siteData',
            'success' =>  'Service card has been added'
        ]);
    }
}
