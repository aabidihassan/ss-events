<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Fournisseur;

class ProfileController extends Controller
{
    public static function editProfile(Request $req){
        if(auth()->user()->type=='client'){
            Client::where('id', auth()->user()->id_user)
            ->update(['nom'=>$req->nom, 'prenom'=>$req->prenom, 'email'=>$req->email, 'telephone'=>$req->telephone, 'adresse'=>$req->adresse]);
            $client = Client::where('id', auth()->user()->id_user)->first();
            $req->session()->put('profile', $client);
        }else{
            Fournisseur::where('id', auth()->user()->id_user)
            ->update(['nom'=>$req->nom, 'prenom'=>$req->prenom, 'email'=>$req->email,'telephone'=>$req->telephone,
            'citie'=>$req->citie, 'service'=>$req->service,
            'raison'=>$req->raison, 'adresse'=>$req->adresse, 'email2'=>$req->email2, 'telephone2'=>$req->telephone2, 'description'=>$req->description,
            'fb'=>$req->fb, 'whatsapp'=>$req->whatsapp, 'insta'=>$req->insta, 'twitter'=>$req->twitter]);
            $fournisseur = Fournisseur::where('id', auth()->user()->id_user)->first();
            $req->session()->put('profile', $fournisseur);
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

    public function store(Request $request){
        $image = $request->file('image');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('fournisseurs/'. auth()->user()->id), $imageName);
        return response()->json(['success'=>'Image uploaded successfully.']);
    }

    public function updateProfilePicture(Request $request){
        Fournisseur::where('id', auth()->user()->id_user)->update(['photo'=>auth()->user()->id . "/" .$request->image]);
        $fournisseur = Fournisseur::where('id', auth()->user()->id_user)->first();
        $request->session()->put('profile', $fournisseur);
        return response()->json(['message' => 'Profile picture updated successfully']);
    }
}
