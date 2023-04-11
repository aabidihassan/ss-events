<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = classe::all();
        return view('backoffice.administrators.classes', ["classe"=>$classes]);
    }

    public static function getAll(){
        $classes = classe::all();
        return view('backoffice.administrators.classes', ["classes"=>$classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function  create(Request $req)
    {
        $classe = new classe;
        $classe->type = $req->type;
        $classe->gold_6_months = $req->gold_6_months;
        $classe->gold_12_months = $req->gold_12_months;
        $classe->platinum_6_months = $req->platinum_6_months;
        $classe->platinum_12_months = $req->platinum_12_months;
        $classe->save();
        return redirect('/administrator/classes');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function show(classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function edit(classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\classe  $classe
     * @return \Illuminate\Http\Response
     */
    public static function update(Request $req)
    {
        $classe =  classe::find($req->id_classe);
        $classes = classe::all();
        if ($classe) {
            $classe->type = $req->type;
            $classe->gold_6_months = $req->gold_6_months;
            $classe->gold_12_months = $req->gold_12_months;
            $classe->platinum_6_months = $req->platinum_6_months;
            $classe->platinum_12_months = $req->platinum_12_months;
            $classe->save();
            $message = ['code' => '1' , 'msg' => 'Classe bien modéfier'];
            return redirect('/administrator/classes');
           // return view('backoffice.administrators.classes',["classes"=>$classes, 'message'=>$message]);
        }
        $message = ['code' => '0' , 'msg' => 'Erruer de modéfication la classe !'];
        return redirect('/administrator/classes');
        //return view('backoffice.administrators.classes',["classes"=>$classes, 'message'=>$message]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\classe  $classe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        $classe =  classe::find($req->id_classe);
        $classes = classe::all();
        if ($classe) {
            $classe->delete();
            $message = ['code' => '1' , 'msg' => ''];
            return redirect('/administrator/classes');
            //return view('backoffice.administrators.classes',["classes"=>$classes, 'message'=>$message]);
        }
        $message = ['code' => '0' , 'msg' => 'Erruer de Suppression la classe !'];
        return redirect('/administrator/classes');
        //return view('backoffice.administrators.classes',["classes"=>$classes, 'message'=>$message]);
    }
}
