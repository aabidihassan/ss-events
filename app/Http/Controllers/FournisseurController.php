<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use App\Models\Citie;
use App\Models\Service;
use App\Models\Classe;
use App\Models\Feedback;
use App\Models\abonnements;
use Illuminate\Http\Request;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FournisseurController extends Controller
{
    public static function getAll(){
        $data = Fournisseur::all();
        $services = Service::join('classes','classes.id','=','services.id_classe')
        ->select('services.*', 'classes.gold_6_months', 'classes.platinum_6_months', 'classes.platinum_12_months', 'classes.gold_12_months')
        ->get();
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

    public static function espaceFournisseur(){
        $services = Service::join('classes','classes.id','=','services.id_classe')
                                        ->select('services.*','classes.*')
                                        ->get();
        $classes = classe::all();
        return view('fournisseurs.espace-fournisseur', ["services"=>$services, "classes" => $classes]);
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
        $fournisseur = Fournisseur::select('*')->where('id',session('profile')->id)->first();
        if(!$fournisseur)
        {
            $fournisseur = new Fournisseur;
            $fournisseur->photo = "";
        }
        return view('backoffice.prestataires.profile', [ "fournisseur" => $fournisseur,"cities"=>$cities, "services"=>$services]);
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
                                ->first();
        if(!$fournisseur)
        {
            $fournisseur = new Fournisseur;
            $fournisseur->vues = 0;
            $fournisseur->photo = "";
        }
        return view('backoffice.prestataires.dashboard', ["fournisseur" => $fournisseur,"avgRating"=>$avgRating]);
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
            Fournisseur::where('id', $req->id_fournisseur)->update(['statut'=>1]);
            $fournisseur =  Fournisseur::where('id', $req->id_fournisseur)->first();
            $service = Service::where('id',$req->service)->first();
            $abonnement = new abonnements();
            $abonnement->id_service = $req->service;
            $abonnement->id_fournisseur = $req->id_fournisseur;
            $abonnement->number_month = $req->number_month;
            $abonnement->start_date = Carbon::now();
            $currentDate = Carbon::now();
            $newDate = $currentDate->addMonths($abonnement->number_month);
            $abonnement->end_date = $newDate;
            $abonnement->prix = $req->prix;
            $abonnement->save();

            $data = [
                'nom' => $fournisseur->nom,
                'prenom' => $fournisseur->prenom,
                'content' => ['service'=> $service->libelle,
                                'abonnement' => $abonnement]
                                
            ];
            Mail::to($fournisseur->email)->send(new WelcomeEmail($data,'Votre abonnement a été renouvelé avec succès'));
            return redirect('/administrator/fournisseurs');
        } catch (\Exception $e) {
            $errorMessage = (string) $e->getMessage();
            return response()->json([
                'error' => $errorMessage
            ]);
        }
    }
}
