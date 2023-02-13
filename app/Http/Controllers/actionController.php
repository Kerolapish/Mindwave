<?php

namespace App\Http\Controllers;

use App\Models\background;
use App\Models\brand;
use App\Models\content;
use App\Models\footer;
use App\Models\information;
use App\Models\service;
use App\Models\Team;
use App\Models\siteProperty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class actionController extends Controller
{

    //function to direct user to mainpage of the website
    public function index()
    {
        $brandData = brand::find(1);
        $contentData = content::find(1);
        $infoData = information::find(1);
        $serviceData = service::all();
        $teamData = team::all();
        $footerData = footer::find(1);
        $siteData = siteProperty::find(1);
        $bgData = background::find(1);

        return view('HomePage', compact('brandData', 'contentData', 'infoData', 'serviceData', 'teamData', 'footerData', 'siteData', 'bgData'));
    }

    // function to direct user to login page
    public function loginPage()
    {
        return view('/admin/loginPage');
    }

    // function to direct user to register page
    public function registerPage()
    {
        return view('/admin/registerPage');
    }

    //function to direct user to unauthorize page
    public function unathorizeError()
    {
        return view('/error/unauthorize');
    }

    // function to direct user to admin dashboard
    public function dashboard()
    {
        $siteData = siteProperty::find(1);
        return view('/admin/dashboard', compact('siteData'));
    }

    //function to direct user to branding page
    public function branding()
    {
        $brandData = brand::find(1);
        $siteData = siteProperty::find(1);
        return view('admin/pages/branding', compact('brandData', 'siteData'));
    }

    //function to update siteName (Branding)
    public function updateSiteName(Request $request)
    {

        //validation function
        $validatedData = $request->validate([
            'siteName' => 'required',
        ]);

        //select row and save the data requested
        $row = brand::find(1);
        $row->siteName = $validatedData['siteName'];
        $row->save();

        $siteData = siteProperty::find(1);
        $brandData = brand::find(1);
        return redirect()->back()->with([
            'success' =>  'Site name has successfully changed.',
            'brandData',
            'siteData'
        ]);
    }

    //Function to update favicon (Branding)
    public function updateImage(Request $request)
    {

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Retrieve the existing photo from the database
        $image = brand::find(1);

        // Delete the current image from the storage disk
        Storage::disk('public')->delete($image->path);

        // Get the new image file uploaded by the user
        $newImage = $request->file('image');

        // Get the original file name
        $originalFileName = $newImage->getClientOriginalName();

        // Store the new image on the storage disk with the original file name
        $newImagePath = $newImage->storeAs('images', $originalFileName, 'public');

        // Update the image path in the database
        $image->path = $newImagePath;
        $image->save();

        // Redirect or return a success message
        return redirect()->back()->with('success', 'Image has been updated successfully.');
    }

    //Function to update Logo in branding page
    public function updateLogo(Request $request)
    {

        $validatedData = $request->validate([
            'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        // Retrieve the existing photo from the database
        $logo = brand::find(1);

        // Delete the current logo from the storage disk
        Storage::disk('public')->delete($logo->logoPath);


        // Get the new image file uploaded by the user
        $newLogo = $request->file('logo');

        // Get the original file name
        $originalFileName = $newLogo->getClientOriginalName();

        // Store the new image on the storage disk with the original file name
        $newLogoPath = $newLogo->storeAs('image', $originalFileName, 'public');

        // Update the image path in the database
        $logo->logoPath = $newLogoPath;
        $logo->save();

        // Redirect or return a success message
        return redirect()->back()->with('success', 'Logo has been updated successfully.');
    }

    //function to direct user to background page
    public function background()
    {
        $bgData = background::find(1);
        $siteData = siteProperty::find(1);
        return view('admin/pages/background', compact('bgData', 'siteData'));
    }

    //Function to save video background
    public function updateVidBg(Request $request)
    {

        $validatedData = $request->validate([
            'video' => 'required|mimes:mp4,mkv,avi|max:100000',
        ]);

        // Retrieve the existing video from the database
        $video = background::find(1);

        // Delete the current video from the storage disk
        Storage::disk('public')->delete($video->vidPath);

        // Get the new video file uploaded by the user
        $newVideo = $request->file('video');

        // Get the original file name
        $originalFileName = $newVideo->getClientOriginalName();

        // Store the new video on the storage disk with the original file name
        $newVideoPath = $newVideo->storeAs('videos', $originalFileName, 'public');

        // Update the video path in the database
        $video->vidPath = $newVideoPath;
        $video->save();

        // Redirect or return a success message
        return redirect()->back()->with('success', 'Video has been updated successfully.');
    }

    //Function to update Primary  Background (Background)
    public function updateBg1(Request $request)
    {

        $validatedData = $request->validate([
            'background-1' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Retrieve the existing background from the database
        $image = background::find(1);

        // Delete the current background from the storage disk
        Storage::disk('public')->delete($image->bg1Path);


        // Get the new background file uploaded by the user
        $newImage = $request->file('background-1');

        // Get the original file name
        $originalFileName = $newImage->getClientOriginalName();

        // Store the new background on the storage disk with the original file name
        $newImagePath = $newImage->storeAs('images', $originalFileName, 'public');

        // Update the background path in the database
        $image->bg1Path = $newImagePath;
        $image->save();


        // Redirect or return a success message
        return redirect()->back()->with('success', 'Image has been updated successfully.');
    }

    //Function to update Secondary Background (Background)
    public function updateBg2(Request $request)
    {

        $validatedData = $request->validate([
            'background-2' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        // Retrieve the existing background from the database
        $image = background::find(1);

        // Delete the current background from the storage disk
        Storage::disk('public')->delete($image->bg2Path);


        // Get the new background file uploaded by the user
        $newImage = $request->file('background-2');

        // Get the original file name
        $originalFileName = $newImage->getClientOriginalName();

        // Store the new background on the storage disk with the original file name
        $newImagePath = $newImage->storeAs('images', $originalFileName, 'public');

        // Update the background path in the database
        $image->bg2Path = $newImagePath;
        $image->save();


        // Redirect or return a success message
        return redirect()->back()->with('success', 'Image has been updated successfully.');
    }

    //function to direct user to content page
    public function content()
    {
        $contentData = content::find(1);
        $siteData = siteProperty::Find(1);
        return view('admin/pages/content', compact('contentData', 'siteData'));
    }

    //function to update top title (content)
    public function updateTopTitle(Request $request)
    {

        //validate data
        $validatedData = $request->validate([
            'title' => 'required',
        ]);

        //select row and save the data requested
        $row = content::find(1);
        $row->topTitle = $validatedData['title'];
        $row->save();

        $contentData = content::find(1);
        return redirect()->back()->with([
            'success' =>  'Top title has successfully changed.',
            'contentData'
        ]);
    }

    //function to update paragraph (content)
    public function updateParagraph(Request $request)
    {

        //validate data
        $validatedData = $request->validate([
            'text' => 'required',
        ]);

        //select row and save the data requested 
        $row = content::find(1);
        $row->paragraph = $validatedData['text'];
        $row->save();

        $contentData = content::find(1);
        return redirect()->back()->with([
            'success' =>  'Top paragraph has successfully changed.',
            'contentData'
        ]);
    }

    //function to direct user to information page
    public function information()
    {
        $infoData = information::find(1);
        $siteData = siteProperty::find(1);
        return view('admin/pages/information', compact('infoData', 'siteData'));
    }

    //function to update phone number (information)
    public function updatePhoneNumber(Request $request)
    {

        //validate data
        $validatedData = $request->validate([
            'phone' => 'required',
        ]);

        //select row and save the data requested 
        $row = information::find(1);
        $row->phoneNum = $validatedData['phone'];
        $row->save();

        $siteData = siteProperty::find(1);
        $infoData = information::find(1);
        return redirect()->back()->with([
            'success' =>  'Company phone number has successfully changed.',
            'infoData',
            'siteData'
        ]);
    }

    //function to update street address (information)
    public function updateAddress(Request $request)
    {

        //validate data
        $validatedData = $request->validate([
            'address' => 'required'
        ]);

        //select row and save the data requested 
        $row = information::find(1);
        $row->address = $validatedData['address'];
        $row->save();

        $siteData = siteProperty::find(1);
        $infoData = information::find(1);
        return redirect()->back()->with([
            'success' =>  'Company street address has successfully changed.',
            'infoData',
            'siteData'
        ]);
    }

    //function to update email address (information)
    public function updateEmail(Request $request)
    {

        //validate data
        $validatedData = $request->validate([
            'email' => 'required | email',
        ]);

        //select row and save the data requested 
        $row = information::find(1);
        $row->email = $validatedData['email'];
        $row->save();

        $siteData = siteProperty::find(1);
        $infoData = information::find(1);
        return redirect()->back()->with([
            'success' =>  'Company email address has successfully changed.',
            'infoData',
            'siteData'
        ]);
    }

    //function to direct user to service page
    public function service()
    {
        $serviceData = service::all();
        $siteData = siteProperty::find(1);
        return view('admin/pages/service', compact('serviceData', 'siteData'));
    }

    //function to update service card by ID (service)
    public function updateCardService(Request $request, $id)
    {

        //validate data
        $validatedData = $request->validate([
            'title' => 'required',
            'paragraph' => 'required'
        ]);

        //select row and save the data requested
        $row = service::find($id);
        $row->title = $validatedData['title'];
        $row->desc = $validatedData['paragraph'];
        $row->save();

        $serviceData = service::all();
        $siteData = siteProperty::find(1);
        return redirect()->back()->with([
            'success' =>  'Service card has successfully changed.',
            'serviceData',
            'siteData'
        ]);
    }

    //functiom to direct user to team page
    public function team()
    {
        $teamData = team::all();
        $siteData = siteProperty::find(1);
        return view('admin/pages/team', compact('teamData' , 'siteData'));
    }

    //fuction to update team card by ID (Team)
    public function updateTeam(Request $request, $id)
    {

        //validate data
        $validatedData = $request->validate([
            'name' => 'required',
            'position' => 'required',
            'url' => 'required | url',
            'image' => 'sometimes|required|image|mimes:jpg,png,jpeg|max:2048'
        ]);

        //select row and save the data requested
        $row = team::find($id);
        $row->name = $validatedData['name'];
        $row->position = $validatedData['position'];
        $row->url = $validatedData['url'];

        if ($request->hasFile('image')) {

            // Delete the current image from the storage disk
            Storage::disk('public')->delete($row->path);

            // Get the new image file uploaded by the user
            $newImage = $request->file('image');

            // Get the original file name
            $originalFileName = $newImage->getClientOriginalName();

            // Store the new image on the storage disk with the original file name
            $newImagePath = $newImage->storeAs('images', $originalFileName, 'public');

            // Update the image path in the database
            $row->path = $newImagePath;
        }


        $row->save();

        $siteData = siteProperty::find(1);
        $teamData = team::all();
        return redirect()->back()->with([
            'success' =>  'Team card has successfully changed.',
            'serviceData' => $teamData,
            'siteData'
        ]);
    }

    //function to direct user to site status page
    public function siteStatus()
    {
        $siteData = siteProperty::find(1);
        return view('admin/pages/siteStatus', compact('siteData'));
    }

    // this function will check for the current
    // user pass before able to continue the action
    // to disable the site access
    public function disableSite(Request $request)
    {
        if (Hash::check($request->password, Auth::user()->password)) {

            $row = siteProperty::find(1);
            $row->downStatus = true;
            $row->save();
            return "success";
        } else {
            return "error";
        }
    }

    //function to enable site access
    public function enableSite()
    {

        //select row and save preset value to db
        $row = siteProperty::find(1);
        $row->downStatus = false;
        $row->save();

        $siteData = siteProperty::find(1);
        return redirect()->back()->with([
            'success' =>  'Page has been enabled successfully.',
            'siteData' => $siteData
        ]);
    }

    //function to direct user to footer page
    public function footer()
    {
        $footerData = footer::find(1);
        $siteData = siteProperty::find(1);
        return view('admin/pages/footer', compact('footerData' , 'siteData'));
    }

    //function to update footer content (footer)
    public function updateFooter(Request $request)
    {

        //validate data
        $validatedData = $request->validate([
            'content' => 'required'
        ]);

        //select row and save the data requested
        $row = footer::find(1);
        $row->desc = $validatedData['content'];
        $row->save();

        $siteData = siteProperty::find(1);
        $footerData = footer::find(1);
        return redirect()->back()->with([
            'success' =>  'Footer description has successfully changed.',
            'footerData' => $footerData,
            'siteData'
        ]);
    }

    //function to go to profile page
    public function updateProfile()
    {
        $siteData = siteProperty::find(1);
        return view('admin/pages/profile', compact('siteData'));
    }

    //function to update username 
    public function updateUsername (Request $request , $id)
    {

        $validatedData = $request -> validate([
            'username' => 'required | min:7 | alpha_dash'
        ]);

        $user = User::find($id);
        $user -> name = $validatedData['username'];
        $user -> save();

        $siteData = siteProperty::find(1);

        return redirect()->back()->with([
            'success' =>  'Username has successfully changed.',
            'siteData'
        ]);
    }

    //function to update password 
    public function updatePassword (Request $request , $id)
    {

        $validatedData = $request -> validate([
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

        $user = User::find($id);
        $user -> password = Hash::make($validatedData['password']);
        $user -> save();

        $siteData = siteProperty::find(1);

        return redirect()->back()->with([
            'success' =>  'Username has successfully changed.',
            'siteData'
        ]);
    }
}
