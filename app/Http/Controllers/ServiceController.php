<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public static function getAll(){
        $services = Service::all();
        return view('backoffice.administrators.services', ["services"=>$services]);
    }

    public function desactivate($id){
        Service::where('id', $id)->update(['statut'=>0]);
        return redirect('/administrator/services');
    }

    public function activate($id){
        Service::where('id', $id)->update(['statut'=>1]);
        return redirect('/administrator/services');
    }

    public function addService(Request $request)
    {
        try {
            $service = new Service;
            $service->libelle = $request->input('libelle');
            $email = $request->input('description');
            $service->save();
            return redirect('/administrator/services');
        }catch (Exception $e) {
            $errorMessage = (string) $e->getMessage();
            return response()->json([
                'error' => $errorMessage
            ]);
        }
    }
}
