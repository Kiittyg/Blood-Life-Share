<?php

namespace App\Http\Controllers;
use App\Models\Centrehospitalier;
use App\Models\Localite;
use App\Models\Responsable;
use App\Models\Fonction;
use Illuminate\Http\Request;

class CentrehospitalierController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $centrehospitalier = Centrehospitalier::all();
        $localite = Localite::all();
        return view('centrehospitalier.index', compact('centrehospitalier', 'localite',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $localite = Localite::all();
        return view('centrehospitalier.create', compact('localite'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $centrehospitalier = new Centrehospitalier;
        $centrehospitalier->nom = $request->nom;
        $centrehospitalier->telephone = $request->telephone;
        $centrehospitalier->email = $request->email;
        $centrehospitalier->localite_id = $request->localite_id;
        $centrehospitalier->save();

        $responsable = Responsable::latest()->first();
        return redirect()->route('enregistrer.fonction', [
            'centrehospitalier_id' => $centrehospitalier->id,
            'responsable_code_unique' => $responsable->code_unique
             ])->with('success', 'Centre Hospitalier et Responsable ajoutés avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $localite = Localite::all();
        $centrehospitalier = Centrehospitalier::findOrFail($id);
        return view('centrehospitalier.edit', compact('centrehospitalier','localite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $centrehospitalier = Centrehospitalier::find($id);
        $localite = Localite::all();
        $centrehospitalier->nom = $request->nom;
        $centrehospitalier->telephone = $request->telephone;
        $centrehospitalier->email = $request->email;
        $centrehospitalier->localite_id = $request->localite_id;
        $centrehospitalier->update();
        return redirect()->route('centrehospitalier.index')->with('success','Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $centrehospitalier= Centrehospitalier::find($id);
        $localite->delete();
        return redirect()->route('centrehospitalier.index')->with('success', 'Successfully');
    }
}
