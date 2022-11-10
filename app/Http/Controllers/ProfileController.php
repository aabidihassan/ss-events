<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;

class ProfileController extends Controller
{
    public static function editProfile(Request $req){
        if(auth()->user()->type=='client'){
            Client::where('id', auth()->user()->id_user)
            ->update(['nom'=>$req->nom, 'prenom'=>$req->prenom, 'email'=>$req->email, 'telephone'=>$req->telephone, 'adresse'=>$req->adresse]);
            $client = Client::where('id', auth()->user()->id_user)->first();
            $req->session()->put('profile', $client);
        }
        return redirect()->back()->with(['message' => 'done']);
    }

    public static function editCompte(Request $req){
        if($req->password==''){
            User::where('id', auth()->user()->id)
            ->update(['username'=>$req->username]);
        }else{
            $req->password = \Hash::make($req->password);
            User::where('id', auth()->user()->id)
            ->update(['username'=>$req->username, 'password'=>$req->password]);
        }
        \Auth::user()->update(['username' => $req->username]);
        return redirect()->back()->with(['message' => 'done']);
    }
}
