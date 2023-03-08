<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use \Exception;
use Illuminate\Support\Facades\Auth;

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

    public static function getFeedbacks()
    {
        $user = Auth::user();
        //dd(session()->all());

        $feedbacks = Feedback::join('clients', 'feedback.id_client', '=', 'clients.id')
                            ->where('feedback.id_fournisseur', $user->id_user)
                            ->select('feedback.*', 'clients.prenom', 'clients.nom')
                            ->get();

        return view('backoffice.prestataires.feedbacks', compact('feedbacks'));
    }
}
