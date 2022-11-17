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

    public function desactivate($id){
        Fournisseur::where('id', $id)->update(['statut'=>0]);
        return redirect('/admin/fournisseurs');
    }

    public function activate($id){
        Fournisseur::where('id', $id)->update(['statut'=>1]);
        return redirect('/admin/fournisseurs');
    }
}
