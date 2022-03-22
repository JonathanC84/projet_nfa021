<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use DateTime;
use Illuminate\Http\Request;

class UserReservationController extends Controller
{
    public function create() {

        $reservation = new Reservation();
        $now = new DateTime();
        $reservation->date = $now->format('Y-m-d');
        $reservation->heure = $now->format('H:i');
        $reservation->confirmation = 'null';

        return view('main.reservation', [
            'reservation' => $reservation,
            'now' => $now,
        ]);
    }

    public function edit(int $id) {

        $reservation = Reservation::find($id);

        if($reservation->confirmation === 0) {
            // annulé
            $reservation->confirmation = '0';
        } elseif($reservation->confirmation === 1) {
            // confirmé
            $reservation->confirmation = '1';
        } else {
            // en attente
            $reservation->confirmation = 'null';
        }

        return view('main.modification', [
            'reservation' => $reservation,
        ]);
    }

    public function store(Request $request)
    {
        $rules = $this->getRules();
        $validated = $request->validate($rules);

        $reservation = new Reservation();
        $reservation = $this->formToModel($validated, $reservation);
        $reservation->save();
        
        return redirect()->route('reservation.done', [
            'id' => $reservation->id,
        ]);
    }

    public function update(Request $request, int $id)
    {
        $reservation = Reservation::find($id);

        $rules = $this->getRules();
        $validated = $request->validate($rules);

        $reservation = $this->formToModel($validated, $reservation);
        $reservation->save();

        return redirect()->route('reservation.done', [
            'id' => $reservation->id,
        ]);
    }

    public function done(int $id)
    {
        $reservation = Reservation::find($id);

        return view('main.done', [
            'reservation' => $reservation,
        ]);
    }

    public function destroy(int $id)
    {
        $reservation = Reservation::find($id);

        $reservation->delete();

        return redirect()->route('main.index');
    }

    public function getRules()
    {
        $today = new DateTime();
        // on fixe l'heure et les minutes à zéro
        $today -> setTime(0, 0);

        return [
            // interdiction d'utiliser des chiffres
            'nom' => ['required', 'min:2', 'max:190', 'not_regex:/[0-9]+/'],
            // obligation d'utiliser des chiffres, parenthèses, des plus (le + seulement en tout début)
            'tel' => ['required', 'max:190', 'regex:/^\+?[0-9() ]+$/'],
            // Ce code fonctionne :
            //'date' => ['required', 'date', 'after_or_equal:today'],
            // on peut utiliser DateTime::setTime()
            'date' => ['required', 'date', 'after_or_equal:'.$today->format('Y-m-d')],
            'heure' => ['required'],
            'couverts' => ['required', 'integer', 'between:1,12'],
            // utiliser nullable pour les commentaires
            'commentaires' => ['nullable', 'max:500'],   
            'confirmation' => ['required', 'in:null, 0, 1'],
        ];
    }

    public function formToModel(array $validated, Reservation $reservation) : Reservation
    {
        $reservation->nom = $validated['nom'];
        $reservation->tel = $validated['tel'];
        $reservation->date = $validated['date'];
        $reservation->heure = $validated['heure'];
        $reservation->couverts = $validated['couverts'];
        $reservation->commentaires = $validated['commentaires'];
        if (empty($validated['commentaires'])) {
            $reservation->commentaires = '';
        } else {
            $reservation->commentaires = $validated['commentaires'];
        }

        if ($validated['confirmation'] == '0') {
            // annulé
            $reservation->confirmation = 0;
        } elseif ($validated['confirmation'] == '1') {
            // confirmé
            $reservation->confirmation = 1;
        } else {
            // en attente
            $reservation->confirmation = null;
        }

        return $reservation;
    }
}
