<?php

namespace App\Http\Controllers;
use App\Models\Rendezvous;
use App\Models\Lignerv;
use App\Models\Donneur;
use Illuminate\Http\Request;

class RendezvousController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rendezvous = Rendezvous::all();
        return view('rendezvous.index', compact('rendezvous'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rendezvous.create');
        //$lignerv = Lignerv::all(); // Assurez-vous que le nom du modèle est correct

        //return view('rendezvous.create', compact('lignerv'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$donneur_id = auth()->user()->donneur_id;

    // Créer une nouvelle ligne de rendez-vous dans lignervs
    /*$lignerv = new Lignerv;
    $lignerv->donneur_id = $donneur_id;
    $lignerv->daterv = $request->daterv;
    $lignerv->heurerv = $request->heurerv;
    $lignerv->save();*/

    // Créer le rendez-vous associé à cette ligne dans rendezvous
    $rendezvous = new Rendezvous;
    $rendezvous->save();
    //$rendezvous->lignerv_id = $lignerv->id;
   

    return redirect()->route('rendezvous.index')->with('success', 'Rendez-vous créé avec succès');
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
        $rendezvous = Rendezvous::findOrFail($id);
        return view('rendezvous.edit', compact('rendezvous'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rendezvous =  Rendezvous::find($id);
        $rendezvous->update();
        return redirect()->route('rendezvous.index')->with('success', 'Modification reussi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rendezvous = Rendezvous::find($id);
        $rendezvous->delete();
        return redirect()->route('rendezvous.index')->with('success', 'Suppression Reussi');
    }
}
