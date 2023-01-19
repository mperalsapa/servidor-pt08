<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Athlete as AthleteModel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Mail;

class athlete extends Controller
{
    public function getAgeFromBirthDate(string $birthdate)
    {
        $dateOfBirth = "17-10-1985";
        $today = date("Y-m-d");
        $diff = date_diff(date_create($dateOfBirth), date_create($today));
        return $diff;
    }
    public function showList()
    {

        $athlete = new AthleteModel;
        try {
            $athletes = AthleteModel::paginate(10);
        } catch (QueryException $ex) {
            $message = "S'ha produit un error a l'hora de connectar amb la base de dades. Si l'error persisteix, contacta amb un administrador";
            return view("error-page", compact("message", "ex"));
        }

        return view("index", compact("athletes"));
    }

    public function showForm()
    {
        return view("add-athlete");
    }

    public function formAction(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'birthdate' => 'required|date',
            'origin' => 'required|max:3',
            'deathdate' => 'nullable|required_with:deathreason|date',
            'deathreason' => 'required_with:deathdate',
        ], [
            'name.required' => 'Es requereix el nom.',
            'surname.required' => 'Es requereixen els cognoms.',
            'birthdate.required' => 'Es requereix la data de naixement.',
            'birthdate.date' => 'La data de naixement ha de tenir format de data.',
            'origin.required' => 'Es requereix la procedencia.',
            'origin.max' => 'La procedencia ha de tenir una llargada maxima de :max cáracter.',
            'deathreason.required_with' => 'Si l\'atleta ha mort, s\'ha de especificar que va passar.',
            'deathdate.required_with' => 'Si l\'atleta ha mort, s\'ha de especificar la data.',
            'deathdate.date' => 'La data de defuncio ha de tenir format de data.',
        ]);


        $athlete = new AthleteModel;
        $athlete->name = $request->name;
        $athlete->surname = $request->surname;
        $athlete->birthdate = $request->birthdate;
        $athlete->origin = $request->origin;
        $athlete->awards = $request->awards;
        $athlete->deathdate = $request->deathdate;
        $athlete->deathreason = $request->deathreason;

        try {
            //code...
            $athlete->save();
        } catch (QueryException $ex) {
            $message = "S'ha produit un error a l'hora de connectar amb la base de dades. Si l'error persisteix, contacta amb un administrador";
            return view("error-page", compact("message", "ex"));
        }

        $to = env("MAIL_ADMIN_ADDRESS", "");
        if ($to != "") {
            Mail::to($to)->send(new \App\Mail\AthleteFormMail());
        }

        $message = "S'ha afegit l'atleta correctament";

        return view("success-page", compact("message"));
    }
}
