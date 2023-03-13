<?php

namespace App\Http\Controllers;

use App\Models\abonnements;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbonnementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public static function getAll(){
        $abonnements = abonnements::all();
        return view('backoffice.administrators.abonnement', ["abonnements"=>$abonnements]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\abonnements  $abonnements
     * @return \Illuminate\Http\Response
     */
    public function show(abonnements $abonnements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\abonnements  $abonnements
     * @return \Illuminate\Http\Response
     */
    public function edit(abonnements $abonnements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\abonnements  $abonnements
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, abonnements $abonnements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\abonnements  $abonnements
     * @return \Illuminate\Http\Response
     */
    public function destroy(abonnements $abonnements)
    {
        //
    }
}
