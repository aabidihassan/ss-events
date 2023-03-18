<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\classe;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\FileSystem;

class ServiceController extends Controller
{
    public static function getAll(){
        $services = Service::join('classes','classes.id','=','services.id_classe')
                            ->select('services.*','classes.type','classes.prix_monthly')
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
                $message = ['code' => '0' , 'msg' => 'Service Libelle déjà existe !'];
            }else {
                $service = new Service;
                $uploaddir = 'services/';
                $nameImg = uniqid() . '_' . basename($_FILES['image']['name']);
                $uploadfile = $uploaddir . $nameImg;
                $imageFileType = strtolower(pathinfo($uploadfile,PATHINFO_EXTENSION));
                if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
                    $message = ['code' => '1' , 'msg' => 'Service à été ajouté. '];
                }
                $service->libelle = $request->libelle;
                $service->id_classe = $request->classe;
                $service->description = $nameImg;
                $service->save();
            }
            return redirect('/administrator/services');
        }catch (Exception $e) {
            $errorMessage = (string) $e->getMessage();
            return response()->json([
                'error' => $errorMessage
            ]);
        }
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
        $service =  service::find($req->id_service);
        if ($service) {
            $service->libelle = $req->libelle;
            $service->id_classe = $req->classe;
            $service->save();
            $message = ['code' => '1' , 'msg' => 'Service bien modéfier'];
            return redirect('/administrator/services');
        }
        $message = ['code' => '0' , 'msg' => 'Erruer de modéfication service !'];
        return redirect('/administrator/services');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\classe  $classe
     * @return \Illuminate\Http\Response
     */
    public static function destroy(Request $req)
    {
        $service =  service::find($req->id_service);
        if ($service) {
            $service->delete();
            $message = ['code' => '1' , 'msg' => ''];
            return redirect('/administrator/services');
        }
        $message = ['code' => '0' , 'msg' => 'Erruer de Suppression la service !'];
        return redirect('/administrator/services');
    }
}
