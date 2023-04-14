<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prefournisseur;
use App\Models\Fournisseur;
use App\Models\User;
use App\Models\Service;
use App\Models\abonnements;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\FileSystem;
use Carbon\Carbon;

class PresController extends Controller
{
    public static function getPres(){
        $prefournisseurs = Prefournisseur::orderBy('created_at', 'desc')->get();
        return view('backoffice.administrators.prefournisseurs', ["prefournisseurs"=>$prefournisseurs]);
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
            $fournisseur->service = $pre->service;
            $fournisseur->save();
            $user = new User();
            $user->username = $pre->nom.$pre->prenom;
            $user->password = \Hash::make($user->username);
            $user->type = 'fournisseur';
            $user->id_user = $fournisseur->id;
            $user->email =$fournisseur->email;
            $user->save();
            Prefournisseur::where('id', $req->id_prefournisseur)->delete();
            $path = public_path('fournisseurs/'.$user->id);
            if (!File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            $abonnement = new abonnements();
            $abonnement->id_service = $req->service;
            $abonnement->id_fournisseur = $fournisseur->id;
            $abonnement->number_month = $req->number_month+4;
            $abonnement->typeAbonnemant = $req->typeAbon;
            $abonnement->start_date = Carbon::now();
            $currentDate = Carbon::now();
            $newDate = $currentDate->addMonths($abonnement->number_month);
            $abonnement->end_date = $newDate;
            $abonnement->prix = $req->prix;
            $abonnement->save();

            $data = [
                'nom' => $fournisseur->nom,
                'prenom' => $fournisseur->prenom,
                'content' => ['username'=>$user->username ,
                                'password'=>$user->username,
                                'service'=>$serviceLibelle->libelle,
                                'abonnement' => $abonnement]

            ];
            Mail::to($fournisseur->email)->send(new WelcomeEmail($data,'Félicitation Votre demande été accepté'));
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

}
