<?php

namespace App\Http\Controllers;
use App\Models\Centre;
use App\Models\Localite;
use Illuminate\Http\Request;

class CentreController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $centre = Centre::all();
        $localite = Localite::all();
        return view('centre.index', compact('centre', 'localite'));
    }

    /**
     * Show the form for creating a new resource.$table->id();
            
     */
    public function create()
    {
        $localite = Localite::all();
        return view('localite.create', compact('localite'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $centre = new Centre;
        $centre->nom = $request->nom;
        $centre->telephone = $request->telephone;
        $centre->email = $request->email;
        $centre->localite_id = $request->localite_id;
        $centre->save();
        return redirect()->route('centre.index')->with('success','Successfully');
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
        $centre = Centre::findOrFail($id);
        return view('centre.edit', compact('centre','localite'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $centre = Centre::find($id);
        $localite = Localite::all();
        $centre->nom = $request->nom;
        $centre->telephone = $request->telephone;
        $centre->email = $request->email;
        $centre->localite_id = $request->localite_id;
        $centre->update();
        return redirect()->route('centre.index')->with('success','Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $centre= Centre::find($id);
        $localite->delete();
        return redirect()->route('centre.index')->with('success', 'Successfully');
    }
}
