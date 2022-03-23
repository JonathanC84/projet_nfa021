<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Plat;
use App\Models\Etiquette;
use App\Models\Reservation;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{  
    public function index()
    {
        return view('main.index');
    }

    public function testIndex()
    {
        $message='Hello World';
        return view('main.test-index', [
            'message'=>$message,
        ]);
    }
    
    public function carte()
    {
        $plats = Plat::select()
            ->orderBy('categorie_id')
            ->orderBy('nom')
            ->get();

        return view('main.carte', [
            'plats' => $plats,
        ]);
    }

    public function reservation()
    {
        return view('main.reservation');
    }

    public function contact()
    {
        return view('main.contact');
    }

    public function test()
        {

        // récupère tous les plats
        // $plats = Plat::all();

        // récupère tous les plats et les trie par ordre alphabétique sur la colonne "nom"
        $plats = Plat::select()->orderBy('nom')->get();

        foreach ($plats as $plat) {
            dump('<<###-LE PLAT-###>>');
            dump($plat->id, $plat->nom, $plat->prix);
        
            $categorie = $plat->categorie()->first();
            dump('<#-LA CATEGORIE-#>');
            dump($categorie->id, $categorie->nom, $categorie->description);

            $etiquettes = $plat->etiquettes()->orderBy('nom')->get();
            
            foreach ($etiquettes as $etiquette) {
                dump('<#-L\'ETIQUETTE-#>');
                dump($etiquette->id, $etiquette->nom, $etiquette->description);
            }
        }

        //$etiquettes = Etiquette::all();
        $etiquettes = Etiquette::select()->orderBy('nom')->get();

        foreach ($etiquettes as $etiquette) {
            dump('<###-L\'ETIQUETTE-###>');
            dump($etiquette->id, $etiquette->nom, $etiquette->description);

            $plats = $etiquette->plats()->select()->orderBy('nom')->get();
            
            foreach ($plats as $plat) {
                dump('<#-LE PLAT-#>');
                dump($plat->id, $plat->nom, $plat->description);
            }
        }

        //$categories = Categorie::all();
        $categories = Categorie::select()->orderBy('nom')->get();
 
        foreach ($categories as $categorie) {
            // enregistre les données dans le fichier 'storage/logs/laravel.log
            //Log::debug($categorie);
            // autre méthode : afficher avec dump
            dump('<###-LA CATEGORIE-###>');
            dump($categorie->id, $categorie->nom, $categorie->description);
            // utilisation de la fonction plats() pour récupérer la liste des plats associés à la catégorie
            $plats = $categorie->plats()->select()->orderBy('nom')->get();

            foreach ($plats as $plat) {
                dump('<#-LE PLAT-#>');
                dump($plat->id, $plat->nom, $plat->description, $plat->prix);
            }
        }
    }

    public function testReservation()
    {
        $reservation = new Reservation();
        $reservation -> nom = 'Toto';
        $reservation -> tel = '0612345678';
        $reservation -> date = '2022-04-01';
        $reservation -> heure = '18:00';
        $reservation -> couverts = 200;
        // attention : il ne faut pas définir la confirmation qui reste NULL 

        // enregistrement des données
        $reservation->save();

        // cette fonction récupère la réservation dont l'id = 1
        $reservation = Reservation::find(1);
        // modification des données
        $reservation->confirmation = false;
        // enregistrement des données
        $reservation->save();

        // récupère toutes les résercations en triant par id et par ordre décroissant
        // càd la réservation la plus récente
        $reservation = Reservation::select()->orderBy('id', 'desc')->first();
        dump('#SUPPRESSION');
        dump($reservation->id);
        // suppression de l'élément
        $reservation->delete();

        // récupère toutes les réservations, en les triant par jour puis par heure
        $reservations = Reservation::select()->orderBy('date')->orderBy('heure')->get();

        foreach ($reservations as $reservation) {
            dump('<#-RESERVATION-#>');
            dump($reservation->id);
            dump($reservation->nom);
            dump($reservation->tel);
            dump($reservation->date);
            dump($reservation->heure);
            dump($reservation->couverts);
            dump($reservation->confirmation);
            dump($reservation->created_at);
        }
    }
}