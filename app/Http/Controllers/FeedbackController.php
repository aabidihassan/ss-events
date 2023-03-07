<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function addCommit(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:newsletter_emails,email'
        ]);

        NewsletterEmail::create($request->all());

        return 'Thank you for subscribing!';
    }
}
