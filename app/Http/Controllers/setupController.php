<?php

namespace App\Http\Controllers;

use App\Models\footer;
use App\Models\information;
use App\Models\service;
use App\Models\brand;
use App\Models\background;
use App\Models\siteProperty;
use App\Models\team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class setupController extends Controller
{
    //function to go to branding form page
    public function createBranding()
    {
        $siteData = siteProperty::find(1);
        $brandData = brand::find(1);
        return view('admin/pages/branding', compact('siteData', 'brandData'));
    }

    //function to direct user to background page
    public function createBackground()
    {
        $siteData = siteProperty::find(1);
        $bgData = background::find(1);
        return view('admin/pages/background', compact('bgData', 'siteData'));
    }

    //function to create new favicon
    public function createFavicon(Request $request)
    {

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

        $newVid = $video->getClientOriginalName();
        $newbg1 = $bg1->getClientOriginalName();
        $newbg2 = $bg2->getClientOriginalName();

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
    public function createLogo(Request $request)
    {

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
        $service->title = $validateData['title'];
        $service->desc = $validateData['paragraph'];
        $service->save();

        //invoke function to check all the column value
        $this->checkSetup();

        //get data from db
        $siteData = siteProperty::find(1);
        $serviceData = service::all();

        //check if service row have 6 row
        if ($serviceData->count() == 6) {
            $site = siteProperty::find(1);
            $site->setupService = true;
            $site->save();
        }

        return redirect()->back()->with([
            'serviceData' => $serviceData,
            'siteData',
            'success' =>  'Service card has been added'
        ]);
    }

    //function to got to team form page
    public function createTeam()
    {
        $siteData = siteProperty::find(1);
        $teamData = team::all();
        return view('admin/pages/team', compact('siteData', 'teamData'));
    }

    //function to add new row to team table
    public function addTeam(Request $request)
    {
        //validate data from request
        $validatedData = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'url' => 'required | url',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        //create row and save the data requested
        $team = new team();
        $team->name = $validatedData['name'];
        $team->position = $validatedData['position'];
        $team->url = $validatedData['url'];

        $newImage = $request->file('image');
        $originalFileName = $newImage->getClientOriginalName();
        $newImagePath = $newImage->storeAs('images', $originalFileName, 'public');
        $team->path = $newImagePath;

        $team->save();

        //get data from db
        $teamData = team::all();
        $siteData = siteProperty::find(1);

        //check if service row have 6 row
        if ($teamData->count() == 3) {
            $site = siteProperty::find(1);
            $site->setupTeam = true;
            $site->save();
        }

        //invoke function to check all the column value
        $this->checkSetup();

        return redirect()->back()->with([
            'teamData' => $teamData,
            'siteData',
            'success' =>  'team card has been added'
        ]);
    }

    //function to go to footer form page
    public function createFooter()
    {
        $siteData = siteProperty::find(1);
        $footerData = footer::find(1);
        return view('admin/pages/footer', compact('siteData', 'footerData'));
    }

    //function to add new row to footer table
    public function addFooter(Request $request)
    {
        //validate data fro
        $validateData = $request->validate(['content' => 'required']);

        //create row and save the data requested
        $footer = new footer();
        $footer->desc = $validateData['content'];
        $footer->save();

        //set the setup properties to true
        $site = siteProperty::find(1);
        $site->setupFooter = true;
        $site->save();

        //invoke function to check all the column value
        $this->checkSetup();

        //get data from db
        $footerData = footer::find(1);
        $siteData = siteProperty::find(1);

        return redirect()->back()->with([
            'footerData',
            'siteData',
            'success' =>  'footer has been added'
        ]);
    }

    //function to go to information form page
    public function createInfo()
    {
        $siteData = siteProperty::find(1);
        $infoData = information::find(1);
        return view('admin/pages/information', compact('siteData', 'infoData'));
    }

    //function to add new row to information table
    public function addInfo(Request $request)
    {
        $validateData = $request->validate([
            'phone' => 'required',
            'email' => 'required | email',
            'url' => "required | url",
            'address' => 'required'
        ]);

        //create row and save data requested
        $info = new information();
        $info->phoneNum = $validateData['phone'];
        $info->email = $validateData['email'];
        $info->website = $validateData['url'];
        $info->address = $validateData['address'];

        $info->save();

        //set the setup properties to true
        $site = siteProperty::find(1);
        $site->setupInfo = true;
        $site->save();

        //invoke function to check all the column value
        $this->checkSetup();

        //get data from db
        $infoData = team::find(1);
        $siteData = siteProperty::find(1);

        return redirect()->back()->with([
            'infoData',
            'siteData',
            'success' =>  'Company info has been added'
        ]);
    }

    //check if all setup has been complete
    public function checkSetup()
    {

        //array with the columns name
        $columns = ['setupBrand', 'setupBackground', 'setupTitle', 'setupInfo', 'setupService', 'setupTeam', 'setupFooter'];
        $setup = siteProperty::find(1);

        //check if all the column has been set
        foreach ($columns as $column) {
            if ($setup->$column == true) {

                //if its return true, the site property column, hasetup will change into true
                $site = siteProperty::find(1);
                $site->hasSetup = true;
                $site->downStatus = false;
                $site->save();
            }
            return false;
        }
    }
}
