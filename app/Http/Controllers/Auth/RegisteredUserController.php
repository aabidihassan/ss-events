<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Prefournisseur;
use App\Models\Fournisseur;
use App\Models\Client;
use App\Models\Citie;
use App\Models\Classe;
use App\Models\Service;
use App\Mail\WelcomeEmail;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cities = Citie::all();
        $services = Service::all();
        return view('auth.register',['cities' => $cities, 'services' => $services]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        if($request->type == 'pre'){
            $user = new User;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $user->type = 'fournisseur';
            $user->save();
            $pre = new Prefournisseur;
            $pre->nom = $request->nom;
            $pre->prenom = $request->prenom;
            $pre->email = $request->email;
            $pre->telephone = $request->phone;
            $pre->statut = false;
            $pre->citie = $request->citie;
            $pre->service = $request->service;
            $pre->id_user = $user->id;
            $pre->save();
            $request->session()->put('profile', new Fournisseur);
            $data = [
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'content' => 'Votre demande a été soumise avec succès',
            ];
            Mail::to($request->email)->send(new WelcomeEmail($data,'Merci d \'avoir rejoint EVENTSKECH'));
            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }else{
            $client = new Client;
            $client->nom = $request->nom;
            $client->telephone = $request->phone;
            $client->citie = $request->citie;
            $client->email = $request->email;
            $client->save();
            $user = new User;
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->email = $request->email;
            $user->type = 'client';
            $user->id_user = $client->id;
            $user->save();
            $request->session()->put('profile', $client);

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }
    }
}
