<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function addCommit($var)
    {
        /*$feedback = new Feedback();
        $feedback->id_client = $var->id_client;
        $feedback->id_fournisseur = $var->id_fournisseur;
        $feedback->commentText = $var->commentaire;
        $feedback->rating = $var->rating;
        $feedback->save();*/
        $request->validate([
            'email' => 'required|email|unique:newsletter_emails,email'
        ]);

        NewsletterEmail::create($request->all());

        return 'Thank you for subscribing!';
    }
}
