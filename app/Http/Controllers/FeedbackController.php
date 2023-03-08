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
            if (property_exists(session('profile'), 'service')) 
                throw new Exception("Votre compte n'est pas valide pour ajouter un commentaire".session('profile')->getAll()->json());
            $feedback->id_client = session('profile')->id;
            $feedback->id_fournisseur = $request->fournisseur;
            if (!empty($request->commentaire)) 
                $feedback->commentaire = $request->commentaire;
            else
                $feedback->commentaire = "";
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
