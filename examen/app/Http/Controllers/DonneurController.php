<?php

namespace App\Http\Controllers;
use App\Models\Donneur;
use App\Models\Groupesanguin;
use App\Models\Localite;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DonneurController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $donneur = Donneur::all();
        $groupesanguin = Groupesanguin::all();
        $localite = Localite::all();
        return view('donneur.index',compact('donneur','groupesanguin','localite'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groupesanguin= Groupesanguin::all();
        $localite = Localite::all();
        return view('donneur.create', compact('groupesanguin','localite'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $donneur = new Donneur;
        $donneur->code_unique = $request->code_unique;
        $donneur->nom = $request->nom;
        $donneur->prenom = $request->prenom;
        $donneur->naissance = $request->naissance;
        $donneur->sexe= $request->sexe;
        $donneur->ville = $request->ville;
        $donneur->telephone = $request->telephone;
        $donneur->email = $request->email;
        $donneur->login = $request->login;
        $donneur->motdepasse = $request->motdepasse;
        $donneur->groupesanguin_id = $request->groupesanguin_id;
        $donneur->localite_id = $request->localite_id;
        $donneur->save();
        return redirect()->route('donneur.index')->with('success','Successfully');
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
        $donneur = Donneur::findOrFail($id);
        $groupesanguin = Groupesanguin::all();
        $localite = Localite::all();
        return view('donneur.edit', compact('donneur','groupesanguin','localite'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $donneur = Donneur::find($id);
        $donneur->code_unique = $request->code_unique;
        $donneur->nom = $request->nom;
        $donneur->prenom = $request->prenom;
        $donneur->naissance = $request->naissance;
        $donneur->sexe= $request->sexe;
        $donneur->ville = $request->ville;
        $donneur->telephone = $request->telephone;
        $donneur->email = $request->email;
        $donneur->login = $request->login;
        $donneur->motdepasse = $request->motdepasse;
        $donneur->groupesanguin_id = $request->groupesanguin_id;
        $donneur->localite_id = $request->localite_id;
        $donneur->update();
        return redirect()->route('donneur.index')->with('success','Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $donneur= Donneur::find($id);
        $donneur->delete();
        return redirect()->route('donneur.index')->with('success', 'Successfully');
    }
}
