<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Fournisseur;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public static function getAll(){
        $data = Client::all();
        return view('admin.clients', ["data"=>$data]);
    }

    public function desactivate($id){
        Client::where('id', $id)->update(['statut'=>0]);
        return redirect('/admin/clients');
    }

    public function activate($id){
        Client::where('id', $id)->update(['statut'=>1]);
        return redirect('/admin/clients');
    }

    public static function showFournisseur($id)
    {
        $data = Fournisseur::where('statut', true)->where('id', $id)->get();
        return view('client.detailsFournisseur', ["fournisseur"=>$data]);   
    }
}
