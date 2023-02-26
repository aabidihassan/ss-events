<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class ContactUsController extends Controller
{

    public static function submitContactForm(Request $request)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        $data = [
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('labos.management@gmail.com')->send(new ContactUsMail($data));

        return back()->with('success', 'Thank you for contacting us!');
    }
}
