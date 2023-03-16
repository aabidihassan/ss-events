<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use App\Models\Citie;
use App\Models\Service;
use App\Models\Feedback;
use App\Models\abonnements;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FournisseurController extends Controller
{
    public static function getAll(){
        $data = Fournisseur::all();
        $services = Service::all();
        return view('backoffice.administrators.fournisseurs', ["fournisseurs"=>$data, "services"=>$services]);
    }

    public static function index(){
        $data = Fournisseur::where('statut', true)->get();
        $services = Service::all();
        $cities = Citie::all();
        $avgsRatings = Feedback::select('id_fournisseur', DB::raw('ROUND(avg(rating),1) as average'), DB::raw('count(*) as count'))
                            ->groupBy('id_fournisseur')
                            ->get();
        return view('client.fournisseur', ["fournisseurs"=>$data, "services"=>$services,"cities"=>$cities,"avgsRatings" => $avgsRatings ]);
    }

    public function search(Request $req){
        if (empty($req->service) && isset($req->citie))
            $data = Fournisseur::where('statut', true)->where('citie', $req->citie)->get();
        elseif (empty($req->citie) && isset($req->service))
            $data = Fournisseur::where('statut', true)->where('service', $req->service)->get();
        else 
            $data = Fournisseur::where('statut', true)->where('service', $req->service)->where('citie', $req->citie)->get();
        $services = Service::all();
        $cities = Citie::all();
        return view('client.fournisseur', ["fournisseurs"=>$data, "services"=>$services,"cities"=>$cities ,"avgsRatings" => 0]);
    }

    public function desactivate($id){
        Fournisseur::where('id', $id)->update(['statut'=>0]);
        return redirect('/administrator/fournisseurs');
    }

    public function activate($id){
        Fournisseur::where('id', $id)->update(['statut'=>1]);
        return redirect('/administrator/fournisseurs');
    }

    public static function getProfile(){
        $cities = Citie::all();
        $services = Service::all();
        $fournisseur = Fournisseur::select('*')->where('id',session('profile')->id)->get();
        return view('backoffice.prestataires.profile', [ "fournisseur" => $fournisseur->first() ,"cities"=>$cities, "services"=>$services]);
    }
    public static function getAbonnement(){
       $abonnements = abonnements::where('id_fournisseur',session('profile')->id)->get(); 
       return view('backoffice.prestataires.abonnement',['abonnements'=>$abonnements]);
    }

    public static function mydash()
    {
        $avgRating = Feedback::select('id_fournisseur', DB::raw('ROUND(avg(rating),1) as average'), DB::raw('count(*) as count'))
                                ->groupBy('id_fournisseur')
                                ->where('id_fournisseur',session('profile')->id)
                                ->get();
        $fournisseur = Fournisseur::select('*')
                                ->where('id',session('profile')->id)
                                ->get();
        return view('backoffice.prestataires.dashboard', ["fournisseur" => $fournisseur->first(),"avgRating"=>$avgRating]);
    }

    public static function incrementContactWhatsApp(Request $req){
        try {
            if(auth()->user()->type === 'client')
                Fournisseur::where('id', $req->id)->increment('countContact');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        return response()->json(['message' => 'Good']);
    }

    public static function createAbonnement(Request $req)
    {
        try {
       
            $serviceID = Service::where('libelle',$req->service)->first();
            $abonnement = new abonnements();
            $abonnement->id_service = $serviceID->id;
            $abonnement->id_fournisseur = $req->id_prefournisseur;
            $abonnement->start_date = Carbon::now();
            $abonnement->end_date = $req->end_date;
            $abonnement->number_month =  $req->numbreMonth;
            $abonnement->save();
            return redirect('/administrator/prefournisseurs');
        } catch (\Exception $e) {
            $errorMessage = (string) $e->getMessage();
            return response()->json([
                'error' => $errorMessage
            ]);
        }
    }
}
