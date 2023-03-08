<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citie;
use App\Models\Service;
use App\Models\Fournisseur;
use App\Models\Feedback;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public static function index(){
        $cities = Citie::all();
        $services = Service::all();
        $fournisseurs = Fournisseur::where('statut', true)->take(6)->whereNotNull('photo')->get();
        $fournisseurIds = $fournisseurs->pluck('id')->toArray();
        $avgsRatings = Feedback::select('id_fournisseur', DB::raw('ROUND(avg(rating),1) as average'), DB::raw('count(*) as count'))
                                    ->whereIn('id_fournisseur',$fournisseurIds)
                                    ->groupBy('id_fournisseur')
                                    ->get();
        return view('index', ["cities"=>$cities, "services"=>$services, "fournisseurs"=>$fournisseurs, "avgsRatings" => $avgsRatings]);
    }
}
