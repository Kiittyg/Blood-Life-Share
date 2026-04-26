<?php

namespace App\Http\Controllers;
use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $responsable =  Responsable::all();
        return view('responsable.index', compact('responsable'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('responsable.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $responsable = new Responsable;
        $responsable->code_unique = $request->code_unique;
        $responsable->nom = $request->nom;
        $responsable->prenom = $request->prenom;
        $responsable->naissance = $request->naissance;
        $responsable->sexe= $request->sexe;
        $responsable->ville = $request->ville;
        $responsable->telephone = $request->telephone;
        $responsable->boite_postale = $request->boite_postale;
        $responsable->email = $request->email;
        $responsable->login = $request->login;
        $responsable->motdepasse = $request->motdepasse;
        $responsable->fonction = $request->fonction;
        $responsable->save();
        return redirect()->route('responsable.index')->with('success','Successfully');
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
        $responsable = Responsable::findOrFail($id);
        return view('responsable.edit', compact('responsable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $responsable = Responsable::find($id);
        $responsable->code_unique = $request->code_unique;
        $responsable->nom = $request->nom;
        $responsable->prenom = $request->prenom;
        $responsable->naissance = $request->naissance;
        $responsable->sexe= $request->sexe;
        $responsable->ville = $request->ville;
        $responsable->telephone = $request->telephone;
        $responsable->email = $request->email;
        $responsable->login = $request->login;
        $responsable->motdepasse = $request->motdepasse;
        $responsable->fonction = $request->fonction;
        $responsable->boite_postale = $request->boite_postale;
        $responsable->update();
        return redirect()->route('responsable.index')->with('success','Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $responsable = Responsable::find($id);
        $responsable->delete();
        return redirect()->route('responsable.index')->with('success', 'Suppression Reussi');
    }
}
