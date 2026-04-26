<?php

namespace App\Http\Controllers;
use App\Models\Lignedemande;
use App\Models\Donneur;
use App\Models\Demandedon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LignedemandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     */
    public function index()
    {
        $donneurId = Auth::id();

    
    $lignedemande = Lignedemande::where('donneur_id', $donneurId)
        ->with('demandedon') // Charger les relations demandées
        ->get();
    $demandedon = Demandedon::all();
    return view('lignedemande.index', compact('demandedon', 'lignedemande'));
       /* $lignedemande = Lignedemande::all();
        $donneur = Donneur::all();
        $demandedon = Demandedon::all();
        return view('lignedemande.index',compact('lignedemande','donneur','demandedon'));
        $demandedon = Demandedon::all(); // Récupérer toutes les demandes de don
    $lignedemande = Lignedemande::where('donneur_id', Auth::id())->with(['demandedon', 'demandedon.groupesanguin'])
    ->get();
    return view('lignedemande.index', compact('demandedon', 'lignedemande'));*/
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       /* $donneur= Donneur::all();
        $demandedon = Demandedon::all();
        return view('lignedemande.create', compact('donneur','demandedon'));*/
        return view('lignedemande.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$lignedemande = new Lignedemande;
        $lignedemande->donneur_id = $request->donneur_id;
        $lignedemande->demandedon_id = $request->demandedon_id;
        $lignedemande->datedemande = $request->datedemande;
        $lignedemande->heuredemande = $request->heuredemande;
        $lignedemande->save();
        return redirect()->route('lignedemande.index')->with('success','Successfully');*/
        $request->validate([
            'nomdemandeur' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
            'lieu' => 'required|string|max:255',
            'nbdonneurs' => 'required|integer|min:1',
        ]);
        $donneur = Donneur::where('id', Auth::id())->first();

if (!$donneur || empty($donneur->code_unique)) {
    return redirect()->back()->with('error', 'Vous devez être un donneur pour créer une demande de don.');
}

// Extraire les parties utilisées pour former le code_unique
$telephone_suffix = substr($donneur->telephone, -2);
$prenom_prefixe = substr($donneur->prenom, 0, 3);

// Former le code_unique attendu
$expected_code_unique = $telephone_suffix . $prenom_prefixe;

// Vérifier si le code_unique de l'utilisateur correspond à celui attendu
if ($donneur->code_unique !== $expected_code_unique) {
    return redirect()->route('lignedemande.index')->with('success','Vous devez être un donneur pour créer une demande de don.');
}
        // Créer une nouvelle entrée dans la table Demandedon
        $demandedon = new Demandedon;
        $demandedon->nomdemandeur = $request->nomdemandeur;
        $demandedon->statut = $request->statut;
        $demandedon->lieu = $request->lieu;
        $demandedon->nbdonneurs = $request->nbdonneurs;
        $demandedon->save();

        // Créer une nouvelle entrée dans la table Lignedemande
        $lignedemande = new Lignedemande;
        $lignedemande->donneur_id = Auth::id();
        $lignedemande->demandedon_id = $demandedon->id;
        $lignedemande->datedemande = now()->toDateString();
        $lignedemande->heuredemande = now()->toTimeString();
        $lignedemande->save();

        return redirect()->route('lignedemande.index')->with('success', 'Demande de don créée avec succès');
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
        /*$lignedemande = Lignedemande::findOrFail($id);
        $donneur = Donneur::all();
        $demandedon = Demandedon::all();
        return view('lignedemande.edit', compact('lignedemande','donneur','demandedon'));*/
        $lignedemande = Lignedemande::findOrFail($id);
        return view('lignedemande.edit', compact('lignedemande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       /* $lignedemande = Lignedemande::find($id);
        $lignedemande->donneur_id = $request->donneur_id;
        $lignedemande->demandedon_id = $request->demandedon_id;
        $lignedemande->datedemande = $request->datedemande;
        $lignedemande->heuredemande = $request->heuredemande;
        $lignedemande->update();
        return redirect()->route('lignedemande.index')->with('success','Successfully');*/
        $request->validate([
            'nomdemandeur' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
            'lieu' => 'required|string|max:255',
            'nbdonneurs' => 'required|integer|min:1',
        ]);

        // Mettre à jour la demande de don
        $lignedemande = Lignedemande::findOrFail($id);
        $demandedon = $lignedemande->demandedon;
        $demandedon->nomdemandeur = $request->nomdemandeur;
        $demandedon->statut = $request->statut;
        $demandedon->lieu = $request->lieu;
        $demandedon->nbdonneurs = $request->nbdonneurs;
        $demandedon->save();

        // Mettre à jour la ligne de demande
        $lignedemande->datedemande = now()->toDateString();
        $lignedemande->heuredemande = now()->toTimeString();
        $lignedemande->save();

        return redirect()->route('lignedemande.index')->with('success', 'Demande de don mise à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lignedemande = Lignedemande::findOrFail($id);
        $lignedemande->delete();
        return redirect()->route('lignedemande.index')->with('success', 'Demande de don supprimée avec succès');
        /*$lignedemande= Lignedemande::find($id);
        $lignedemande->delete();
        return redirect()->route('lignedemande.index')->with('success', 'Successfully');*/
    }
}
