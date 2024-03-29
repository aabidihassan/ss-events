<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Fournisseur;
use App\Models\Citie;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(auth()->user()->type == 'client'){
            $client = Client::where('id', auth()->user()->id_user)->first();
            $request->session()->put('profile', $client);
        }elseif(auth()->user()->type == 'fournisseur'){
            if (isset(auth()->user()->id_user))
                $fournisseur = Fournisseur::where('id', auth()->user()->id_user)->first();
            else{
                $fournisseur = new Fournisseur;
            }
            $request->session()->put('profile', $fournisseur);
            $cities = Citie::all();
            $request->session()->put('cities', $cities);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
