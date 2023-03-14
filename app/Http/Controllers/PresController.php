<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefournisseur;
use App\Models\Fournisseur;
use App\Models\User;
use App\Models\Service;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\FileSystem;

class PresController extends Controller
{
    public static function getPres(){
        $prefournisseurs = Prefournisseur::all();
        $services = Service::join('classes','classes.id','=','services.id_classe')
                                ->select('services.*','classes.*')
                                ->get();
        return view('backoffice.administrators.prefournisseurs', ["prefournisseurs"=>$prefournisseurs,"services"=>$services]);
    }

    public static function accept(Request $req){
        try {
            $pre = Prefournisseur::where('id', $req->id_prefournisseur)->first();
            $fournisseur = new Fournisseur();
            $fournisseur->nom = $pre->nom;
            $fournisseur->prenom = $pre->prenom;
            $fournisseur->email = $pre->email;
            $fournisseur->telephone = $pre->telephone;
            $fournisseur->statut = 1;
            $fournisseur->save();
            $user = new User();
            $user->username = $pre->nom.$pre->prenom;
            $user->password = \Hash::make($user->username);
            $user->type = 'fournisseur';
            $user->id_user = $fournisseur->id;
            $user->save();
            Prefournisseur::where('id', $req->id_prefournisseur)->delete();
            //$this->createFolder($user->id);
            //PresController::class->createFolder($user->id);           
            return redirect('/administrator/prefournisseurs');
        } catch (\Exception $e) {
            $errorMessage = (string) $e->getMessage();
            return response()->json([
                'error' => $errorMessage
            ]);
        }
    }

    public function decline($id){
        Prefournisseur::where('id', $id)->update(['statut'=>1]);
        return redirect('/administrator/prefournisseurs');
    }

    public function createFolder($id)
    {
        $path = public_path('fournisseurs/'.$id);
        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }
    }
}
