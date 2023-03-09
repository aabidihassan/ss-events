<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public static function getAll(){
        $data = Client::all();
        return view('admin.clients', ["data"=>$data]);
    }

    public function desactivate($id){
        Client::where('id', $id)->update(['statut'=>0]);
        return redirect('/admin/clients');
    }

    public function activate($id){
        Client::where('id', $id)->update(['statut'=>1]);
        return redirect('/admin/clients');
    }

    public static function showFournisseur($id)
    {
        $data = Fournisseur::where('statut', true)->where('id', $id)->get();
        $feedbacks = Feedback::join('clients','clients.id','=','feedback.id_client')
                            ->select('feedback.*','clients.nom','clients.prenom')
                            ->where('id_fournisseur',$id)
                            ->get();
        $avgRating = Feedback::select('id_fournisseur', DB::raw('ROUND(avg(rating),1) as average'), DB::raw('count(*) as count'))
                                ->groupBy('id_fournisseur')
                                ->where('id_fournisseur',$id)
                                ->get();
        Fournisseur::where('id', $id)->increment('vues');
        $idFileImages = User::select('id')->where('type', 'fournisseur')->where('id_user',$id)->get();
        return view('client.detailsFournisseur', ["fournisseur"=>$data, "feedbacks" => $feedbacks,"avgRating" => $avgRating->first(),"idFileImages" => $idFileImages ]);   
    }

    public static function getAllC(){
        $clients = Client::all();
        return view('backoffice.administrators.clients', ["clients"=>$clients]);
    }
}
