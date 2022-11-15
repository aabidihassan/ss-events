<?php

namespace App\Http\Controllers;
use App\Models\Fournisseur;

use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    public static function getAll(){
        $data = Fournisseur::all();
        return view('admin.fournisseurs', ["data"=>$data]);
    }

    public static function desactivate(){
        Fournisseur::where('id', $req->id)->update(['statut', 0]);
        $data = Fournisseur::all();
        return view('admin.fournisseurs', ["data"=>$data]);
    }

    public static function activate(){
        Fournisseur::where('id', $req->id)->update(['statut', 1]);
        $data = Fournisseur::all();
        return view('admin.fournisseurs', ["data"=>$data]);
    }
}
