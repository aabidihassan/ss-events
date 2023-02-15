<?php

namespace App\Http\Controllers;

use App\Models\NewsletterEmail;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public static function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_emails,email'
        ]);

        NewsletterEmail::create($request->all());

        return 'Thank you for subscribing!';
    }
}
