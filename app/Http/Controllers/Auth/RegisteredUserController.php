<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Prefournisseur;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
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
        return view('auth.register');
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
            $pre = new Prefournisseur;
            $pre->nom = $request->nom;
            $pre->prenom = $request->prenom;
            $pre->email = $request->email;
            $pre->telephone = $request->phone;
            $pre->save();
            return redirect()->back()->with(['message' => 'done']);
        }else{
            $client = new Client;
            $client->nom = $request->nom;
            $client->prenom = $request->prenom;
            $client->email = $request->email;
            $client->telephone = $request->phone;
            $client->adresse = $request->adresse;
            $client->save();
            $user = User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'type' => 'client',
                'id_user' => $client->id
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(RouteServiceProvider::HOME);
        }
    }
}
