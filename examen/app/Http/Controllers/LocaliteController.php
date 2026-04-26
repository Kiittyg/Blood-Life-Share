<?php

namespace App\Http\Controllers;
use App\Models\Localite;
use Illuminate\Http\Request;

class LocaliteController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     */
    public function index()
    {
        $localite = Localite::all();
        return view('localite.index', compact('localite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('localite.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $localite = new Localite;
        $localite->nom = $request->nom;
        $localite->coordonneesgeo = $request->coordonneesgeo;
        $localite->boite_postale = $request->boite_postale;
        $localite->save();
        return redirect()->route('localite.index')->with('success', 'Enregistrement Reussi');
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
        $localite = Localite::findOrFail($id);
        return view('localite.edit', compact('localite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $localite =  Localite::find($id);
        $localite->nom = $request->nom;
        $localite->coordonneesgeo = $request->coordonneesgeo;
        $localite->boite_postale = $request->boite_postale;
        $localite->update();
        return redirect()->route('localite.index')->with('success', 'Modification reussi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $localite =Localite::find($id);
        $localite->delete();
        return redirect()->route('localite.index')->with('success', 'Suppression Reussi');
    }
}
