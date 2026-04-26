<?php

namespace App\Http\Controllers;
use App\Models\Stockgs;
use App\Models\Stock;
use App\Models\Groupesanguin;
use Illuminate\Http\Request;

class stockgsController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     */
    public function index()
    {
        $stockgs = Stockgs::all();
        $stock = Stock::all();
        $groupesanguin=Groupesanguin::all();
        return view('stockgs.index',compact('stockgs','stock','groupesanguin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stock= Stock::all();
        $groupesanguin= Groupesanguin::all();
        return view('stockgs.create', compact('stock','groupesanguin'));
    }

    /**
     * Store a newly created resource in storage.
    
     */
    public function store(Request $request)
    {
        $stockgs = new Stockgs;
        $stockgs->groupesanguin_id = $request->groupesanguin_id;
        $stockgs->stock_id = $request->stock_id;
        $stockgs->quantite = $request->quantite;
        $stockgs->qualite = $request->qualite;
        $stockgs->dateexp = $request->dateexp;
        $stockgs->typestockage = $request->typestockage;
        $stockgs->save();
        return redirect()->route('stockgs.index')->with('success','Successfully');
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
        $stockgs = Stockgs::findOrFail($id);
        $stock = Stock::all();
        $groupesanguin = Groupesanguin::all();
        return view('stockgs.edit', compact('stockgs','stock','groupesanguin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stockgs = Stockgs::find($id);
        $stockgs->groupesanguin_id = $request->groupesanguin_id;
        $stockgs->stock_id = $request->stock_id;
        $stockgs->quantite = $request->quantite;
        $stockgs->qualite = $request->qualite;
        $stockgs->dateexp = $request->dateexp;
        $stockgs->typestockage = $request->typestockage;
        $stock->update();
        return redirect()->route('stockgs.index')->with('success','Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stockgs= Stockgs::find($id);
        $stockgs->delete();
        return redirect()->route('stockgs.index')->with('success', 'Successfully');
    }
}
