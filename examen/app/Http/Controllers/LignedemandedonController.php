<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Lignedemandedon;
use App\Models\Centrehospitalier;
use App\Models\Demandedon;
use Illuminate\Http\Request;

class LignedemandedonController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     */
    public function index()
    {
        $user = session('user');
        $user_type = session('user_type');
    
        if ($user_type == 'donneur') {
            return redirect('/')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }
    
        if ($user_type == 'responsable') {
            $centreHospitalierId = \App\Models\Fonction::where('responsable_id', $user->id)
                ->pluck('centrehospitalier_id')
                ->first();
    
            if ($centreHospitalierId) {
                $lignedemandedon = Lignedemandedon::where('centrehospitalier_id', $centreHospitalierId)->get();
                return view('lignedemandedon.index', [
                    'lignedemandedon' => $lignedemandedon
                ]);
            } else {
                return view('lignedemandedon.index')->with('message', 'Vous n\'êtes pas associé à un centre hospitalier.');
            }
        }
    
        return redirect('/')->with('error', 'Type d\'utilisateur inconnu.');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       /* $centrehospitalier= Centrehospitalier::all();
        $demandedon = Demandedon::all();
        return view('lignedemandedon.create', compact('centrehospitalier','demandedon'));*/
        $user = Auth::user();
        if ($user->user_type !== 'responsable') {
            return redirect('/')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }

        $centrehospitalier = Centrehospitalier::all();
        $demandedon = Demandedon::all();
        return view('lignedemandedon.create', compact('centrehospitalier', 'demandedon'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$lignedemandedon = new Lignedemandedon;
        $lignedemandedon->demandedon_id = $request->demandedon_id;
        $lignedemandedon->centrehospitalier_id = $request->centrehospitalier_id;
        $lignedemandedon->datedemande = $request->datedemande;
        $lignedemandedon->heuredemande = $request->heuredemande;
        $lignedemandedon->save();
        return redirect()->route('lignedemandedon.index')->with('success','Successfully');*/
        $user = Auth::user();
        if ($user->user_type !== 'responsable') {
            return redirect('/')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }

        $lignedemandedon = new Lignedemandedon;
        $lignedemandedon->demandedon_id = $request->demandedon_id;
        $lignedemandedon->centrehospitalier_id = $request->centrehospitalier_id;
        $lignedemandedon->datedemande = $request->datedemande;
        $lignedemandedon->heuredemande = $request->heuredemande;
        $lignedemandedon->save();
        return redirect()->route('lignedemandedon.index')->with('success', 'Successfully');
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
        /*$lignedemandedon = Lignedemandedon::findOrFail($id);
        return view('lignedemandedon.edit', compact('lignedemandedon'));*/
        $lignedemandedon = Lignedemandedon::findOrFail($id);
        return view('lignedemandedon.edit', compact('lignedemandedon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomdemandeur' => 'required|string|max:255',
            'statut' => 'required|string|max:255',
            'lieu' => 'required|string|max:255',
            'nbdonneurs' => 'required|integer|min:1',
        ]);
    
        // Mettre à jour la demande de don
        $lignedemandedon = Lignedemandedon::findOrFail($id);
        $demandedon = $lignedemandedon->demandedon;
        $demandedon->nomdemandeur = $request->nomdemandeur;
        $demandedon->statut = $request->statut;
        $demandedon->lieu = $request->lieu;
        $demandedon->nbdonneurs = $request->nbdonneurs;
        $demandedon->save();
    
        // Mettre à jour la ligne de demande
        $lignedemandedon->datedemande = now()->toDateString();
        $lignedemandedon->heuredemande = now()->toTimeString();
        $lignedemandedon->save();
    
        return redirect()->route('lignedemandedon.index')->with('success', 'Demande de don mise à jour avec succès');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user();
        if ($user->user_type !== 'responsable') {
            return redirect('/')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }

        $lignedemandedon = Lignedemandedon::find($id);
        $lignedemandedon->delete();
        return redirect()->route('lignedemandedon.index')->with('success', 'Successfully');
        /*$lignedemandedon= Lignedemandedon::find($id);
        $lignedemandedon->delete();
        return redirect()->route('lignedemandedon.index')->with('success', 'Successfully');*/
    }
}
