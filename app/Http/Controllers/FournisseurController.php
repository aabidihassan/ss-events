<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;
use App\Models\Citie;
use App\Models\Service;

use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public static function getAll(){
        $data = Fournisseur::all();
        return view('admin.fournisseurs', ["data"=>$data]);
    }

    public static function index(){
        $data = Fournisseur::where('statut', true)->get();
        return view('client.fournisseur', ["fournisseurs"=>$data]);
    }

    public function search(Request $req){
        $data = Fournisseur::where('statut', true)->where('service', $req->service)->where('citie', $req->citie)->get();
        return view('client.fournisseur', ["fournisseurs"=>$data]);
    }

    public function desactivate($id){
        Fournisseur::where('id', $id)->update(['statut'=>0]);
        return redirect('/admin/fournisseurs');
    }

    public function activate($id){
        Fournisseur::where('id', $id)->update(['statut'=>1]);
        return redirect('/admin/fournisseurs');
    }

    public static function profile(){
        $cities = Citie::all();
        $services = Service::all();
        return view('fournisseurs.profile', ["cities"=>$cities, "services"=>$services]);
    }
}
