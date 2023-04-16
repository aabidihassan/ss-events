<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Prefournisseur;
use App\Models\Citie;
use App\Models\Service;
use Illuminate\Support\Facades\File;

class ProfileController extends Controller
{
    public static function editProfile(Request $req){
        if(auth()->user()->type=='client'){
            Client::where('id', auth()->user()->id_user)
            ->update(['nom'=>$req->nom, 'prenom'=>$req->prenom, 'email'=>$req->email, 'telephone'=>$req->telephone, 'adresse'=>$req->adresse ,'citie'=>$req->citie]);
            User::where('id',auth()->user()->id)->update(['email'=>$req->email]);
            $client = Client::where('id', auth()->user()->id_user)->first();
            $req->session()->put('profile', $client);
        }else{
            Fournisseur::where('id', auth()->user()->id_user)
            ->update(['nom'=>$req->nom, 'prenom'=>$req->prenom, 'email'=>$req->email,'telephone'=>$req->telephone,
            'citie'=>$req->citie, 'service'=>$req->service,
            'raison'=>$req->raison, 'adresse'=>$req->adresse, 'email2'=>$req->email2, 'telephone2'=>$req->telephone2, 'description'=>$req->description,
            'fb'=>$req->fb, 'whatsapp'=>$req->whatsapp, 'insta'=>$req->insta]);
            User::where('id',auth()->user()->id)->update(['email'=>$req->email]);
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
    public function deleteProfilePicture(Request $request){

        $imagePath = public_path('fournisseurs/'.auth()->user()->id . "/" .$request->image);
        if (file_exists($imagePath)) {
            if (unlink($imagePath)) {
                return response()->json(['message' => 'Picture delete successfully']);
            } else {
                return response()->json(['message' => 'Error deleting Picture']);
            }
        }
        return response()->json(['message' => 'Picture does not exist']);
    }
    public function checkCount(Request $request)
    {
        $path = public_path('fournisseurs/' . auth()->user()->id);
        $fileCount = count(File::allFiles($path));
        return $fileCount;
    }

    public static function preProfile(){
        $cities = Citie::all();
        $services = Service::all();
        return view('backoffice.prefournisseurs.profile', ["services"=>$services, "cities"=>$cities]);
    }

    public static function editComptePer(Request $req){
        if($req->password==''){
            User::where('id', auth()->user()->id)
            ->update(['email'=>$req->email]);
        }else{
            $req->password = \Hash::make($req->password);
            User::where('id', auth()->user()->id)
            ->update(['email'=>$req->email, 'password'=>$req->password]);
        }
        \Auth::user()->update(['email'=>$req->email]);
        return redirect()->back()->with(['message' => 'done']);
    }

    public static function editProfilePer(Request $req){
        Prefournisseur::where('id', session('profile')->id)
            ->update(['nom'=>$req->nom, 'prenom'=>$req->prenom, 'telephone'=>$req->telephone, 'service'=>$req->service ,'citie'=>$req->citie]);
        $Prefournisseur = Prefournisseur::where('id', session('profile')->id)->first();
        $req->session()->put('profile', $Prefournisseur);
        return redirect()->back()->with(['message' => 'done']);
    }
}
