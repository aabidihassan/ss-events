<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function addCommit(Request $request)
    {

        $feedback = new Feedback;
        $feedback->id_client = 11;
        $feedback->id_fournisseur = $request->fournisseur;
        $feedback->commentaire = $request->commentaire;
        $feedback->rating = $request->rating;
         
        $feedback->save(); 

        return response()->json(['success' => true]);
    }
}
