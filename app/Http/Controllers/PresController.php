<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefournisseur;
use App\Models\Fournisseur;
use App\Models\User;

class PresController extends Controller
{
    public static function getPres(){
        $data = Prefournisseur::all();
        return view('admin.pres', ["data"=>$data]);
    }

    public static function accept(Request $req){
        $pre = Prefournisseur::where('id', $req->id)->first();
        $fournisseur = new Fournisseur();
        $fournisseur->nom = $pre->nom;
        $fournisseur->prenom = $pre->prenom;
        $fournisseur->email = $pre->email;
        $fournisseur->phone = $pre->phone;
        $fournisseur->statut = 1;
        $fournisseur->save();
        $user = new User();
        $user->username = $pre->nom . '.' . $pre->prenom ;
        $user->password = \Hash::make($user->username);
        $user->type = 'fournisseur';
        $user->id_user = $fournisseur->id;
        $user->save();
        Prefournisseur::where('id', $req->id)->delete();
        $data = Prefournisseur::all();
        return view('admin.pres', ["data"=>$data]);
    }

    public static function decline(Request $req){
        Prefournisseur::where('id', $req->id)->update(['active', 0]);
        $data = Prefournisseur::all();
        return view('admin.pres', ["data"=>$data]);
    }
}
