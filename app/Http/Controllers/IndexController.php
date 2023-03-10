<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citie;
use App\Models\Service;
use App\Models\Fournisseur;
use App\Models\Feedback;
use App\Models\User;
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

    public static function adminDashboard()
    {
        $data = Fournisseur::select(
            DB::raw('SUM(CASE WHEN statut = 1 THEN 1 ELSE 0 END) as trueCount'),
            DB::raw('SUM(CASE WHEN statut = 0 THEN 1 ELSE 0 END) as falseCount')
        )->first();
        return view('backoffice.administrators.dashboard',['data'=>$data]);
    }

    public static function checkUser(Request $request)
    {
        try {
            $data = User::where('username',$request->username)->first();
            if ($data)
                return true;
        } catch (\Exception $e) {
            return $e->message;
        }
        return false;
    }
}
