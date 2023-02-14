<?php

namespace App\Http\Controllers;

use App\Models\footer;
use App\Models\information;
use App\Models\service;
use App\Models\brand;
use App\Models\background;
use App\Models\content;
use App\Models\siteProperty;
use App\Models\team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class setupController extends Controller
{
    //function to go to branding form page
    public function createBranding()
    {
        $siteData = siteProperty::find(1);
        $brandData = brand::find(1);
        return view('admin/pages/branding', compact('siteData', 'brandData'));
    }

    //function to add new row to brand table
    public function addBrand(Request $request)
    {

        $validatedData = $request->validate([
            'path' => 'required|image',
            'siteName' => 'required',
            'logoPath' => 'required|image',

        ]);

        //create new row inside DB
        $brand = new brand;
        $path = $validatedData['path'];
        $siteName = $validatedData['siteName'];
        $logoPath = $validatedData['logoPath'];

        $path = $request->file('path')->store('images', 'public');
        $logoPath = $request->file('logoPath')->store('images', 'public');

        $brand->path = $path;
        $brand->siteName = $siteName;
        $brand->logoPath = $logoPath;
        $brand->save();

        //get data from db
        $siteData = siteProperty::find(1);
        $brandData = brand::all();

        //complete brand setup 
        $siteProperty = siteProperty::find(1);
        $siteProperty->setupBrand = true;
        $siteProperty->save();

        //invoke function to check all the column value
        $this->checkSetup();

        return redirect()->back()->with([
            'brandData',
            'siteData',
            'success' =>  'Service card has been added'
        ]);
    }

    //function to direct user to background page
    public function createBackground()
    {
        $siteData = siteProperty::find(1);
        $bgData = background::find(1);
        return view('admin/pages/background', compact('bgData', 'siteData'));
    }

    //function to add new row into background table
    public function addBg(Request $request)
    {

        $validatedData = $request->validate([
            'video' => 'required|file',
            'background1' => 'required|image',
            'background2' => 'required|image',
        ]);

        $video = $validatedData['video'];
        $bg1 = $validatedData['background1'];
        $bg2 = $validatedData['background2'];

        $newVid = $video->getClientOriginalName();
        $newbg1 = $bg1->getClientOriginalName();
        $newbg2 = $bg2->getClientOriginalName();

        // Store the video and background images
        $vidPath = $video->storeAs('images', $newVid, 'public');
        $bg1Path = $bg1->storeAs('images', $newbg1, 'public');
        $bg2Path = $bg2->storeAs('images', $newbg2, 'public');

        // Save the information to the database
        $background = new background;
        $background->vidPath = $vidPath;
        $background->bg1Path = $bg1Path;
        $background->bg2Path = $bg2Path;
        $background->save();

        //get data from db
        $siteData = siteProperty::find(1);
        $bgData = background::all();

        //complete background setup 
        $site = siteProperty::find(1);
        $site->setupBackground = true;
        $site->save();

        //invoke function to check all the column value
        $this->checkSetup();

        return redirect()->back()->with([
            'success' =>  'Site name has successfully changed.',
            'siteData',
            'bgData'
        ]);
    }

    //function to go to content form page
    public function createContent()
    {
        $siteData = siteProperty::find(1);
        $contentData = content::find(1);
        return view('admin/pages/content', compact('siteData', 'contentData'));
    }

    //function to add new row to title table
    public function addContent(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'text' => 'required'
        ]);

        //create new row and save data from request
        $content = new content();
        $content->topTitle = $validatedData['title'];
        $content->paragraph = $validatedData['text'];
        $content->save();

        //invoke function to check all the column value
        $this->checkSetup();

        //get data from db
        $siteData = siteProperty::find(1);
        $contentData = content::all();

        //set the setup properties to true
        $site = siteProperty::find(1);
        $site->setupTitle = true;
        $site->save();

        return redirect()->back()->with([
            'contentData',
            'siteData',
            'success' =>  'Content has been added'
        ]);
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
        $validateData = $request->validate([
            'content' => 'required',
            'facebookUrl' => 'required | url',
            'linkedinURL' => 'required | url'
        ]);

        //create row and save the data requested
        $footer = new footer();
        $footer->desc = $validateData['content'];
        $footer->facebookUrl = $validateData['facebookUrl'];
        $footer->LinkedInUrl = $validateData['linkedinURL'];
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
            'email' => "required | email",
            'address' => 'required'
        ]);

        //create row and save data requested
        $info = new information();
        $info->phoneNum = $validateData['phone'];
        $info->email = $validateData['email'];
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


    //function to direct user to profile form
    public function profile()
    {

        $siteData = siteProperty::find(1);
        return view('admin/pages/profile', compact('siteData'));
    }

    //function to update profile data
    public function setProfile(Request $request, $id)
    {

        //validate data from request 
        $validateData = $request->validate([
            'username' => 'required | min:7 | alpha_dash',
            'password' => [
                'required',
                'string',
                'min:10',             // must be at least 10 characters in length
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
            'Cpassword' => 'required | same:password'
        ]);

        $user = user::find($id);
        $user -> name = $validateData['username'];
        $user -> password = Hash::make($validateData['password']);
        $user -> hasUpdate = true;
        $user -> save();
        
        //invoke function to check all user have update thier detail
        $this -> checkUpdateDetail();
        $this -> checkSetup();
        
        //get data from db
        $siteData = siteProperty::find(1);

        return redirect()->back()->with([
            'siteData',
            'success' =>  'login details has been added. Please use new details to login'
        ]);
    }

    //check if all user has update their profile detail
    public function checkUpdateDetail(){
        
        $allHaveUpdate = User::where('hasUpdate', true)->count();
        $totalUsers = User::count();
        
        if ($allHaveUpdate == $totalUsers) {
            $site = siteProperty::find(1);
            $site->hasCompleteReg = true;
            $site -> save();
        }
    }

    //check if all setup has been complete
    public function checkSetup()
    {

        //array with the columns name
        $columns = ['setupBrand', 'setupBackground', 'setupTitle', 'setupInfo', 'setupService', 'setupTeam', 'setupFooter', 'hasCompleteReg'];
        $setup = siteProperty::find(1);

        $checkAll = true;

        //check if all the column has been set
        foreach ($columns as $column) {
            if ($setup->$column == false) {
                $checkAll = false;
                break;
            }
        }

        if ($checkAll) {
            //if its return true, the site property column, hasetup will change into true
            $site = siteProperty::find(1);
            $site->hasSetup = true;
            $site->downStatus = false;
            $site->save();
        }
    }
}
