<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Models\Fournisseur;
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
                throw new Exception("Votre compte n'est pas valide pour ajouter un commentaire");
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
        $feedbacks = Feedback::join('clients', 'feedback.id_client', '=', 'clients.id')
                            ->where('feedback.id_fournisseur', $user->id_user)
                            ->select('feedback.*', 'clients.prenom', 'clients.nom')
                            ->get();

        return view('backoffice.prestataires.feedbacks', compact('feedbacks'));
    }

    public static  function getFeedbacksFournisseur($id)
    {
        try {
            $feedbacks = Feedback::join('clients','clients.id','=','feedback.id_client')
            ->select('feedback.*','clients.nom','clients.prenom')
            ->where('id_fournisseur',$id)
            ->get();
            $fournisseur = Fournisseur::where('id', $id)->first();
            return view('backoffice.administrators.feedbacks',['feedbacks' => $feedbacks, 'fournisseur' => $fournisseur]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static  function updateFeedback(Request $req)
    {
        try {
            Feedback::where('id_fournisseur', $req->id_fournisseur)->
                        where('id_client', $req->id_client)->
                        update(['commentaire'=>$req->commentaire,'rating'=>$req->rating]);
                        return back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static  function deleteFeedbacks($id_client,$id_fournisseur)
    {
        try {
            Feedback::where('id_fournisseur', $id_fournisseur)
                ->where('id_client', $id_client)
                ->delete();
            return redirect('/administrator/feedbacks/'.$req->id_fournisseur);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getAllFeedbacks(){
        try {
            $feedbacks = Feedback::join('clients','clients.id','=','feedback.id_client')
            ->join('fournisseurs', 'fournisseurs.id', '=', 'feedback.id_fournisseur')
            ->select('feedback.*','clients.nom','clients.prenom', 'fournisseurs.raison')
            ->get();
            return view('backoffice.administrators.allfeedbacks',['feedbacks' => $feedbacks]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
