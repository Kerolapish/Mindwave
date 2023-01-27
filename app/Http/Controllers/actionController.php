<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\content;
use App\Models\information;
use App\Models\service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class actionController extends Controller{

    //function to direct user to mainpage of the website
    public function index(){
        $brandData = brand::find(1);
        $contentData = content::find(1);
        $infoData = information::find(1);
        $serviceData = service::all();
    
        return view('HomePage' , compact('brandData' , 'contentData' , 'infoData' , 'serviceData'));
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
        
        //validation function
        $validatedData = $request->validate([
            'siteName' => 'required',
        ]);
    
        //select row and save the data requested
        $row = brand::find(1);
        $row -> siteName = $validatedData['siteName'];
        $row -> save();

        $brandData = brand::find(1);
        return redirect()->back()->with([
            'success'=>  'Site name has successfully changed.',
            'brandData'
        ]);
    }

        //Function to update picture in branding page
        public function updateImage(Request $request){

        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
            
        // Retrieve the existing photo from the database
        $image = brand::find(1);

        // Delete the current photo from storage
        Storage::delete($image->path);

        // Get the new photo file and store it
        $file = $request->file('image');
        $path = Storage::disk('public')->putFile('assets/images', $file);

        // Update the photo record in the database
        $image->path = $path;
        $image->save();

        // Redirect or return a success message
        return redirect()->back()->with('status', 'Image has been updated successfully.');
    }

    public function updateFavicon(Request $request){
        
    }
    
    
    //function to direct user to content page
    public function content(){
        $contentData = content::find(1);
        return view('admin/pages/content' , compact('contentData'));
    }

    //function to update top title (content)
    public function updateTopTitle(Request $request){

        //validate data
        $validatedData = $request->validate([
            'title' => 'required',
        ]);

         //select row and save the data requested
        $row = content::find(1);
        $row -> topTitle = $validatedData['title'];
        $row -> save();

        $contentData = content::find(1);
        return redirect()->back()->with([
            'success'=>  'Top title has successfully changed.',
            'contentData'
        ]);
    }

    //function to update paragraph (content)
    public function updateParagraph(Request $request){

        //validate data
        $validatedData = $request->validate([
            'text' => 'required',
        ]);

        //select row and save the data requested 
        $row = content::find(1);
        $row -> paragraph = $validatedData['text'];
        $row -> save();

        $contentData = content::find(1);
        return redirect() -> back() -> with([
            'success'=>  'Top paragraph has successfully changed.',
            'contentData'
        ]);
    }

    //function to direct user to information page
    public function information(){
        $infoData = information::find(1);
        return view('admin/pages/information' , compact('infoData'));
    }

    //function to update phone number (information)
    public function updatePhoneNumber (Request $request){

        //validate data
        $validatedData = $request->validate([
            'phone' => 'required',
        ]);

        //select row and save the data requested 
        $row = information::find(1);
        $row -> phoneNum = $validatedData['phone'];
        $row -> save();
        
        $infoData = information::find(1);
        return redirect() -> back() -> with([
            'success'=>  'Company phone number has successfully changed.',
            'infoData'
        ]);
    }

    //function to update street address (information)
    public function updateAddress (Request $request){

        //validate data
        $validatedData = $request->validate([
            'address' => 'required'
        ]);

        //select row and save the data requested 
        $row = information::find(1);
        $row -> address = $validatedData['address'];
        $row -> save();

        $infoData = information::find(1);
        return redirect() -> back() -> with([
            'success'=>  'Company street address has successfully changed.',
            'infoData'
        ]);
    }

    //function to update email address (information)
    public function updateEmail(Request $request){
        
        //validate data
        $validatedData = $request->validate([
            'email' => 'required | email',
        ]);

        //select row and save the data requested 
        $row = information::find(1);
        $row -> email = $validatedData['email'];
        $row -> save();

        $infoData = information::find(1);
        return redirect() -> back() -> with([
            'success'=>  'Company email address has successfully changed.',
            'infoData'
        ]);
    }

    //function to update website URL (information)
    public function updateWebsite(Request $request){

        //validate data
        $validatedData = $request->validate([
            'url' => "required",
        ]);

        //select row and save the data requested 
        $row = information::find(1);
        $row -> website = $validatedData['url'];
        $row -> save();

        $infoData = information::find(1);
        return redirect() -> back() -> with([
            'success'=>  'Company website URL has successfully changed.',
            'infoData'
        ]);
    }

    //function to direct user to service page
    public function service(){
        $serviceData = service::all();
        return view ('admin/pages/service' , compact('serviceData'));
    }

    //function to update service card by ID (service)
    public function updateCardService(Request $request, $id){
        
        //validate data
        $validatedData = $request -> validate([
            'title' => 'required' ,
            'paragraph' => 'required'
        ]);

        //select row and save the data requested
        $row = service::find($id);
        $row -> title = $validatedData['title'];
        $row -> desc = $validatedData['paragraph'];
        $row -> save();

        $serviceData = service::all();
        return redirect() -> back()  -> with([
            'success' =>  'Service card has successfully changed.',
            'serviceData' => $serviceData
        ]);
    }
}
