<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class emailController extends Controller
{
    public function sendemail(Request $request)
    {   
      
        $validate = $request -> validate([
            'email' => 'required | email',
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required'
        ]);

        $data = array(
            'emails' => $request->input('email'),
            'subjects' => $request->input('subject'),
            'names' => $request->input('name'),
            'messages' => $request->input('message')
        );

        Mail::send('emails.email_template', $data, function($message) use ($data) {
            $message->to('zarith7756@gmail.com')
                    ->subject($data['subjects']);
        });
      

        return redirect('/#contact') ->with([
            'success' => 'Message has been received. Thank you'
        ]);
    }
}
