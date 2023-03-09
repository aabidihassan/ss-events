<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefournisseur;
use App\Models\Fournisseur;
use App\Models\User;
use Illuminate\Support\Facades\File;

class PresController extends Controller
{
    public static function getPres(){
        $data = Prefournisseur::all();
        return view('admin.pres', ["data"=>$data]);
    }

    public function accept($id){
        $pre = Prefournisseur::where('id', $id)->first();
        $fournisseur = new Fournisseur();
        $fournisseur->nom = $pre->nom;
        $fournisseur->prenom = $pre->prenom;
        $fournisseur->email = $pre->email;
        $fournisseur->telephone = $pre->telephone;
        $fournisseur->statut = 1;
        $fournisseur->save();
        $user = new User();
        $user->username = $pre->nom . '.' . $pre->prenom ;
        $user->password = \Hash::make($user->username);
        $user->type = 'fournisseur';
        $user->id_user = $fournisseur->id;
        $user->save();
        $this->createFolder($user->id);
        Prefournisseur::where('id', $id)->delete();
        return redirect('/admin/pres');
    }

    public function decline($id){
        Prefournisseur::where('id', $id)->update(['statut'=>1]);
        return redirect('/admin/pres');
    }

    public function createFolder($id)
    {
        $path = public_path('fournisseurs/'.$id);
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
    }
    
    public static function getPreF(){
        $prefournisseurs = Prefournisseur::all();
        return view('backoffice.administrators.prefournisseurs', ["prefournisseurs"=>$prefournisseurs]);
    }
}
