<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citie;
use App\Models\Service;
use App\Models\Fournisseur;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Client;
use App\Models\Prefournisseur;
use App\Models\NewsletterEmail;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public static function index()
    {
        $cities = Citie::all();
        $services = Service::all();

        $fournisseurs = Fournisseur::select('fournisseurs.*')
            ->where('statut', true)
            ->whereNotNull('photo')
            ->whereNotNull('raison')
            ->whereNotNull('citie')
            ->whereNotNull('service')
            ->join('feedback', 'fournisseurs.id', '=', 'feedback.id_fournisseur')
            ->groupBy('fournisseurs.id')
            ->selectRaw('ROUND(AVG(feedback.rating), 1) AS average_rating')
            ->withCount('feedbacks')
            ->orderByDesc('average_rating')
            ->take(6)
            ->get();

        return view('index', ['cities' => $cities, 'services' => $services, 'fournisseurs' => $fournisseurs]);
    }
    public static function CA($countByCity) {
        $result = [];
        $cities = ["Rabat", "Sale", "Agadir", "Safi", "Marrakesh", "Casablanca"];
        foreach ($countByCity as $city) {
            $result[$city->citie] = $city->count;
        }
        foreach ($cities as $city) {
            if (!isset($result[$city])) {
                $result[$city] = 0;
            }
        }
        $countArray = [];
        foreach ($cities as $city) {
            $countArray[] = isset($result[$city]) ? $result[$city] : 0;
        }
        $row = '[' . implode(',', $countArray) . ']';
        return $row;
    }

    public static function adminDashboard()
    {
        $data = Fournisseur::select(DB::raw('SUM(CASE WHEN statut = 1 THEN 1 ELSE 0 END) as trueCount'), DB::raw('SUM(CASE WHEN statut = 0 THEN 1 ELSE 0 END) as falseCount'))->first();
        $dataClient = Client::select('*')
            ->get()
            ->count();
        $dataNewsL = NewsletterEmail::select('*')
            ->get()
            ->count();
        $dataFeedback = Feedback::select('*')
            ->get()
            ->count();
        $countVues = Fournisseur::sum('vues');
        $countContact = Fournisseur::sum('countContact');
        $cities = ["Rabat", "Sale", "Agadir", "Safi", "Marrakesh", "Casablanca"];
        $countByCity = Client::whereIn('citie', $cities)
                    ->select(DB::raw('COUNT(id) as count, citie'))
                    ->groupBy('citie')
                    ->orderBy(DB::raw('FIELD(citie, "'.implode('","', $cities).'")'))
                    ->get();
        $countByCity = IndexController::CA($countByCity);
        $countFournisseurByCity = Fournisseur::whereIn('citie', $cities)
                    ->select(DB::raw('COUNT(id) as count, citie'))
                    ->groupBy('citie')
                    ->orderBy(DB::raw('FIELD(citie, "'.implode('","', $cities).'")'))
                    ->get();
        $countFournisseurByCity = IndexController::CA($countFournisseurByCity);
        $countVuesByCity = Fournisseur::whereIn('citie', $cities)
                                    ->select(DB::raw('sum(vues) as count, citie'))
                                    ->groupBy('citie')
                                    ->orderBy(DB::raw('FIELD(citie, "'.implode('","', $cities).'")'))
                                    ->get();
        $countVuesByCity = IndexController::CA($countVuesByCity);
        $countContactByCity = Fournisseur::whereIn('citie', $cities)
                                    ->select(DB::raw('sum(countContact) as count, citie'))
                                    ->groupBy('citie')
                                    ->orderBy(DB::raw('FIELD(citie, "'.implode('","', $cities).'")'))
                                    ->get();
        $countContactByCity = IndexController::CA($countContactByCity);
        $countFournisseurByService = DB::table('services')
                                            ->select('services.libelle', DB::raw('COUNT(fournisseurs.id) as count'))
                                            ->leftJoin('fournisseurs', 'services.libelle', '=', 'fournisseurs.service')
                                            ->groupBy('services.libelle')
                                            ->get()
                                            ->mapWithKeys(function ($item) {
                                                return [$item->libelle => $item->count];
                                            })
                                            ->toArray();
        $countVuesByService = DB::table('services')
                                            ->select('services.libelle', DB::raw('sum(fournisseurs.vues) as sum'))
                                            ->leftJoin('fournisseurs', 'services.libelle', '=', 'fournisseurs.service')
                                            ->groupBy('services.libelle')
                                            ->get()
                                            ->mapWithKeys(function ($item) {
                                                return [$item->libelle => $item->sum];
                                            })
                                            ->toArray();
        $countContactByService = DB::table('services')
                                            ->select('services.libelle', DB::raw('sum(fournisseurs.countContact) as sum'))
                                            ->leftJoin('fournisseurs', 'services.libelle', '=', 'fournisseurs.service')
                                            ->groupBy('services.libelle')
                                            ->get()
                                            ->mapWithKeys(function ($item) {
                                                return [$item->libelle => $item->sum];
                                            })
                                            ->toArray();
        return view('backoffice.administrators.dashboard', ['data' => $data, 'dataClient' => $dataClient, 'dataNewsL' => $dataNewsL, 
                                                            'dataFeedback' => $dataFeedback, "countVues" => $countVues ,
                                                            'countContact' => $countContact, "countByCity" => $countByCity,
                                                            'countFournisseurByCity' => $countFournisseurByCity,
                                                            'countVuesByCity' => $countVuesByCity,
                                                            'countContactByCity' => $countContactByCity,
                                                            'countFournisseurByService' => $countFournisseurByService,
                                                            'countVuesByService' => $countVuesByService,
                                                            'countContactByService' => $countContactByService]);
    }

}
