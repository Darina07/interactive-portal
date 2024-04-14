<?php

namespace App\Http\Controllers;
use App\Mail\RequestMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Models\FormRequest;
class LandingController extends Controller
{

    public function index(){
        return view('welcome');
    }

    public function create(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:255',
            'terms' => 'required'
        ]);

        // Create a new user or perform any other action with the form data
        $form = FormRequest::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
        ]);



        $senderAddress = config('mail.from.address'); // or env('MAIL_FROM_ADDRESS')

        Mail::to($senderAddress)->send(new RequestMail($form));

        // Redirect back with success message
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }
}
