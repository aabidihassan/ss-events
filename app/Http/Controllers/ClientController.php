<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Feedback;
use App\Models\Citie;
use App\Models\User;
use App\Models\favoir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public static function getAll(){
        $clients = Client::all();
        return view('backoffice.administrators.clients', ["clients"=>$clients]);
    }

    public function desactivate($id){
        Client::where('id', $id)->update(['statut'=>0]);
        return redirect('/administrator/clients');
    }

    public function activate($id){
        Client::where('id', $id)->update(['statut'=>1]);
        return redirect('/administrator/clients');
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
        $feeds = array();
        if (session('profile') != null ) 
        $feeds =  Feedback::join('clients','clients.id','=','feedback.id_client')
                                ->select('feedback.*','clients.nom','clients.prenom')
                                ->where('id_fournisseur',$id)
                                ->where('id_client',session('profile')->id)
                                ->exists();
        $favoir = favoir::where('client_id',session('profile')->id)
                        ->where('fournisseur_id',$id)->exists();
        return view('client.detailsFournisseur', ["fournisseur"=>$data, "feedbacks" => $feedbacks,"avgRating" => $avgRating->first(),
                                    "idFileImages" => $idFileImages , 'allreadyAddFeed' => $feeds,
                                    'favoir' => $favoir ]);
    }

    public static function profile(){

        $feedbacks = Feedback::join('fournisseurs', 'feedback.id_fournisseur', '=', 'fournisseurs.id')
                            ->where('feedback.id_client', session('profile')->id)
                            ->select('feedback.*', 'fournisseurs.raison')
                            ->get();
        $favoirs = favoir::join('fournisseurs', 'favoirs.fournisseur_id', '=', 'fournisseurs.id')
                            ->where('favoirs.client_id', session('profile')->id)
                            ->select('favoirs.*', 'fournisseurs.nom' , 'fournisseurs.prenom')
                            ->get();
        $client = Client::select('*')->where('id',session('profile')->id)->get();
        $cities = Citie::all();
        return view('client.profile', ["client" => $client->first(), "feedbacks"=>$feedbacks, 'cities' => $cities, 'favoirs' => $favoirs]);
    }
}
