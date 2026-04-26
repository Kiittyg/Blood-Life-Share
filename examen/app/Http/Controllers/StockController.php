<?php

namespace App\Http\Controllers;
use App\Models\Stock;
use App\Models\Centre;
use App\Models\Stockgs;
use App\Models\Groupesanguin;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $stock = Stock::with('groupesanguins')->get();
        $centre = Centre::all();
        return view('stock.index', compact('stock', 'centre'));
    }

    /**
     * Show the form for creating a new resource.
     
      
     */
    public function create()
    {
        $centre = Centre::all(); // Récupère tous les centres depuis la base de données
        $groupesanguin = Groupesanguin::all(); // Récupère tous les groupes sanguins depuis la base de données
        return view('stock.create', compact('centre', 'groupesanguin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$stock = new Stock;
        $stock->totalstock = $request->totalstock;
        $stock->responsablestock = $request->responsablestock;
        $stock->misajour = $request->misajour;
        $stock->niveaualerte = $request->niveaualerte;
        $stock->centre_id = $request->centre_id;
        $stock->save();
        return redirect()->route('stock.index')->with('success','Successfully');*/
        $request->validate([
            'totalstock' => 'required|integer',
            'responsablestock' => 'required|string',
            'misajour' => 'required|date',
            'niveaualerte' => 'required|integer',
            'centre_id' => 'required|integer',
            'groupesanguins' => 'required|array',
            'groupesanguins.*.groupesanguin_id' => 'required|integer',
            'groupesanguins.*.quantite' => 'required|integer',
            'groupesanguins.*.qualite' => 'required|string',
            'groupesanguins.*.dateexp' => 'required|date',
            'groupesanguins.*.typestockage' => 'required|string',
        ]);
        $stock = new Stock;
        $stock->totalstock = $request->totalstock;
        $stock->responsablestock = $request->responsablestock;
        $stock->misajour = $request->misajour;
        $stock->niveaualerte = $request->niveaualerte;
        $stock->centre_id = $request->centre_id;
        $stock->save();
    
        foreach ($request->groupesanguins as $groupesanguinData) {
            $stockgs = new Stockgs;
            $stockgs->groupesanguin_id = $groupesanguinData['groupesanguin_id'];
            $stockgs->stock_id = $stock->id;
            $stockgs->quantite = $groupesanguinData['quantite'];
            $stockgs->qualite = $groupesanguinData['qualite'];
            $stockgs->dateexp = $groupesanguinData['dateexp'];
            $stockgs->typestockage = $groupesanguinData['typestockage'];
            $stockgs->save();
        }
        return redirect()->route('stock.index')->with('success', 'Successfully');
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
        $stock = Stock::findOrFail($id);
        $centre = Centre::all();
        return view('stock.edit', compact('stock','centre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stock = Stock::find($id);
        $stock->totalstock = $request->totalstock;
        $stock->responsablestock = $request->responsablestock;
        $stock->misajour = $request->misajour;
        $stock->niveaualerte = $request->niveaualerte;
        $stock->centre_id = $request->centre_id;
        $stock->update();
        return redirect()->route('stock.index')->with('success','Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stock= Stock::find($id);
        $stock->delete();
        return redirect()->route('stock.index')->with('success', 'Successfully');
    }
}
