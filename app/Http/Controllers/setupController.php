<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Models\brand;
use App\Models\background;
use App\Models\siteProperty;
use Illuminate\Http\Request;

class setupController extends Controller
{
    //function to go to branding form page
    public function createBranding()
    {
        $siteData = siteProperty::find(1);
        $brandData = brand::find(1);
        return view('admin/pages/branding', compact('siteData' , 'brandData'));
    }

        //function to direct user to background page
        public function createBackground()
        {
            $siteData = siteProperty::find(1);
            $bgData = background::find(1);
            return view ('admin/pages/background' , compact('bgData' , 'siteData'));
        }

    //function to create new favicon
    public function createFavicon(Request $request){

        $validatedData = $request->validate([
        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    // Get the new image file uploaded by the user
    $newImage = $request->file('image');

    // Get the original file name
    $originalFileName = $newImage->getClientOriginalName();

    // Store the new image on the storage disk with the original file name
    $newImagePath = $newImage->storeAs('images', $originalFileName, 'public');

    // Create a new instance of the brand model
    $image = brand::find(1);

    // Set the path property to the new image path
    $image->path = $newImagePath;

    // Save the new image instance to the database
    $image->save();

    // Redirect or return a success message
    return redirect()->back()->with('success', 'Image has been uploaded successfully.');
    }

    //function to update siteName (Branding)
    public function createSiteName(Request $request)
    {

        //validation function
        $validatedData = $request->validate([
            'siteName' => 'required',
        ]);

        //select row and save the data requested
        $row = brand::find(1);
        $row->siteName = $validatedData['siteName'];
        $row->save();

        $brandData = brand::find(1);
        return redirect()->back()->with([
            'success' =>  'Site name has successfully changed.',
            'brandData'
        ]);
    }

    public function createBg(Request $request)
    {

    $validatedData = $request->validate([
        'video' => 'required|file',
        'bg1' => 'required|image',
        'bg2' => 'required|image',
    ]);
   
    //create new row inside DB
    $background = new background;
    
    $video = $validatedData['video'];
    $bg1 = $validatedData['bg1'];
    $bg2 = $validatedData['bg2'];

    $newVid = $video -> getClientOriginalName();
    $newbg1 = $bg1 -> getClientOriginalName();
    $newbg2 = $bg2 -> getClientOriginalName();

    // Store the video and background images
    $vidPath = $video->storeAs('videos', $newVid, 'public');
    $bg1Path = $bg1->storeAs('images', $newbg1, 'public');
    $bg2Path = $bg2->storeAs('images', $newbg2, 'public');

    // Save the information to the database
    
    $background->vidPath = $vidPath;
    $background->bg1Path = $bg1Path;
    $background->bg2Path = $bg2Path;
    $background->save();

    return redirect()->route('createBg');
}


    //function to go to service form page
    public function createService()
    {
        $siteData = siteProperty::find(1);
        $serviceData = service::all();
        return view('admin/pages/service', compact('siteData', 'serviceData'));
    }

    //function to create new logo
    public function createLogo(Request $request){

        $validatedData = $request->validate([
        'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

    // Get the new image file uploaded by the user
    $newLogo = $request->file('image');

    // Get the original file name
    $originalFileName = $newLogo->getClientOriginalName();

    // Store the new image on the storage disk with the original file name
    $newLogoPath = $newLogo->storeAs('images', $originalFileName, 'public');

    // Create a new instance of the brand model
    $image = brand::find(1);

    // Set the path property to the new image path
    $image->logoPath = $newLogoPath;

    // Save the new image instance to the database
    $image->save();

    // Redirect or return a success message
    return redirect()->back()->with('success', 'Image has been uploaded successfully.');
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
