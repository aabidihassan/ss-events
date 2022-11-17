<?php

namespace App\Http\Controllers;
use App\Models\Client;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public static function getAll(){
        $data = Client::all();
        return view('admin.clients', ["data"=>$data]);
    }

    public function desactivate($id){
        Client::where('id', $id)->update(['statut'=>0]);
        $data = Client::all();
        return view('admin.clients', ["data"=>$data]);
    }

    public function activate($id){
        Client::where('id', $id)->update(['statut'=>1]);
        $data = Client::all();
        return view('admin.clients', ["data"=>$data]);
    }
}
