<?php

namespace App\Http\Controllers;

use App\Models\favoir;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FavoirController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function create(Request $request)
    {
        try {
            if (auth()->user()->type === 'client') {
                if ($request->addOrdelete == "true") {
                    $f = new favoir();
                    $f->client_id = session('profile')->id;
                    $f->fournisseur_id = $request->id;
                    $f->save();
                    return response()->json(['message' => 'Good Add']);
                }else {
                    $f = favoir::where('client_id',session('profile')->id)
                            ->where('fournisseur_id',$request->id)->delete();
                    return response()->json(['message' => 'Good delete']);

                }
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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
     * @param  \App\Models\favoir  $favoir
     * @return \Illuminate\Http\Response
     */
    public function show(favoir $favoir)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\favoir  $favoir
     * @return \Illuminate\Http\Response
     */
    public function edit(favoir $favoir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\favoir  $favoir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, favoir $favoir)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\favoir  $favoir
     * @return \Illuminate\Http\Response
     */
    public function destroy(favoir $favoir)
    {
        //
    }
}
