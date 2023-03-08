<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use \Exception;

class FeedbackController extends Controller
{
    public function addCommit(Request $request)
    {
        try {
            $feedback = new Feedback;
            if (!session('profile') || !property_exists(session('profile'), 'service')) 
                throw new Exception("Votre compte n'est pas valide pour ajouter un commentaire");
            $feedback->id_client = session('profile')->id;
            $feedback->id_fournisseur = $request->fournisseur;
            $feedback->commentaire = $request->commentaire;
            $feedback->rating = $request->rating;
            $feedback->save(); 
        } catch (Exception $e) {
            $errorMessage = (string) $e->getMessage();
            return response()->json([
                'error' => $errorMessage
            ]);
        }
        return response()->json(['success' => true]);
    }
}
