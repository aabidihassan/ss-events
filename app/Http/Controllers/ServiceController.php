<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\classe;

class ServiceController extends Controller
{
    public static function getAll(){
        $services = Service::join('classes','classes.id','=','services.id_classe')
                            ->select('services.*','classes.*')
                            ->get();
        $classes = classe::all();
        return view('backoffice.administrators.services', ["services"=>$services, "classes"=>$classes]);
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
            $data = Service::where('libelle',$request->libelle)->first();
            $message = null;
            if ($data) {
                $message = 0;
            }else {
                $service = new Service;
                $service->libelle = $request->libelle;
                $service->id_classe = $request->classe;
                $service->save();
                $message = 1;
            }
            $services = Service::join('classes','classes.id','=','services.id_classe')
                            ->select('services.*','classes.*')
                            ->get();
            $classes = classe::all();
            return view('backoffice.administrators.services',["services"=>$services, "classes"=>$classes,'message'=>$message]);
        }catch (Exception $e) {
            $errorMessage = (string) $e->getMessage();
            return response()->json([
                'error' => $errorMessage
            ]);
        }
    }
}
