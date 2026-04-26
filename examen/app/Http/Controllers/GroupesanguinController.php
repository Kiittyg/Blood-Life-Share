<?php

namespace App\Http\Controllers;
use App\Models\Groupesanguin;
use Illuminate\Http\Request;

class GroupesanguinController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $groupesanguin = Groupesanguin::all();
        return view('groupesanguin.index', compact('groupesanguin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('groupesanguin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $groupesanguin = new Groupesanguin;
        $groupesanguin->type = $request->type;
        $groupesanguin->facteurrhesus = $request->facteurrhesus;
        $groupesanguin->save();
        return redirect()->route('groupesanguin.index')->with('success', 'Enregistrement Reussi');
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
        $groupesanguin = Groupesanguin::findOrFail($id);
        return view('groupesanguin.edit', compact('groupesanguin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $groupesanguin =  Groupesanguin::find($id);
        $groupesanguin->type = $request->type;
        $groupesanguin->facteurrhesus = $request->facteurrhesus;
        $groupesanguin->update();
        return redirect()->route('groupesanguin.index')->with('success', 'Modification reussi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $groupesanguin = Groupesanguin::find($id);
        $groupesanguin->delete();
        return redirect()->route('groupesanguin.index')->with('success', 'Suppression Reussi');
    }
}
