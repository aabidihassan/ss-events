<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public static function getAll(){
        $data = Service::all();
        return view('admin.services', ["data"=>$data]);
    }

    public function desactivate($id){
        Service::where('id', $id)->update(['statut'=>0]);
        return redirect('/admin/services');
    }

    public function activate($id){
        Service::where('id', $id)->update(['statut'=>1]);
        return redirect('/admin/services');
    }

    public static function getAllS(){
        $services = Service::all();
        return view('backoffice.administrators.services', ["services"=>$services]);
    }
}
