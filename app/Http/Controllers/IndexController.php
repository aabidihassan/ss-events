<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citie;
use App\Models\Service;
use App\Models\Fournisseur;

class IndexController extends Controller
{
    public static function index(){
        $cities = Citie::all();
        $services = Service::all();
        $fournisseurs = Fournisseur::where('statut', true)->take(6)->whereNotNull('photo')->get();
        return view('index', ["cities"=>$cities, "services"=>$services, "fournisseurs"=>$fournisseurs]);
    }
}
