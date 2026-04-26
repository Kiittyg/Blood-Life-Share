<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Demandedon;
use App\Models\Lignedemande;
use App\Models\Lignedemandedon;
use App\Models\Groupesanguin;
use App\Models\Notification;
use App\Models\Donneur;
use App\Models\Responsable;
use Illuminate\Http\Request;

class DemandedonController extends Controller
{
    /**
     * Display a listing of the resource.
     *  $table->string('nomdemandeur');
            
     */
    public function index()
    {
        $demandedon = Demandedon::all();
        $groupesanguin = Groupesanguin::all();
        return view('demandedon.index', compact('demandedon', 'groupesanguin',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groupesanguin = Groupesanguin::all();

        return view('demandedon.create', compact('groupesanguin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomdemandeur' => 'required|string',
            'statut' => 'required|string',
            'lieu' => 'required|string',
            'nbdonneurs' => 'required|integer',
            'groupesanguin_id' => 'required|exists:groupesanguins,id',
        ]);
    
        // Créer une nouvelle demande de don
        $demandedon = new Demandedon();
        $demandedon->nomdemandeur = $request->nomdemandeur;
        $demandedon->statut = $request->statut;
        $demandedon->lieu = $request->lieu;
        $demandedon->nbdonneurs = $request->nbdonneurs;
        $demandedon->groupesanguin_id = $request->groupesanguin_id;
        $demandedon->save();
    
        // Récupérer l'utilisateur connecté
        $user = session('user');
        $user_type = session('user_type');
    
        if (!$user) {
            return redirect()->route('ajout.demandedon')->with('error', 'Vous devez être connecté pour effectuer cette action.');
        }
    
        // Créer une notification
        $notification = new Notification();
        $notification->contenu = "{$request->nomdemandeur} a fait une demande de don de sang. <a href='" . route('demandedon.index') . "'>Cliquez ici pour voir les détails.</a>";
        $notification->datenotif = now()->format('Y-m-d');
        $notification->heurenotif = now()->format('H:i:s');
        $notification->save();
    
        // ID de l'utilisateur qui a fait la demande
        $userToExclude = $user->id;
    
        // Envoi des notifications aux donneurs, sauf celui qui a fait la demande
        $donneurs = Donneur::where('id', '!=', $userToExclude)->get();
        foreach ($donneurs as $donneur) {
            $donneur->notifications()->attach($notification->id);
        }
    
        // Envoi des notifications aux responsables, sauf celui qui a fait la demande
        $responsables = Responsable::where('id', '!=', $userToExclude)->get();
        foreach ($responsables as $responsable) {
            $responsable->notifications()->attach($notification->id);
        }
    
        if ($user_type == 'donneur') {
            // Associer le donneur à la demande de don
            $lignedemande = new Lignedemande();
            $lignedemande->donneur_id = $user->id;
            $lignedemande->demandedon_id = $demandedon->id;
            $lignedemande->datedemande = now()->toDateString();
            $lignedemande->heuredemande = now()->toTimeString();
            $lignedemande->save();
    
            return redirect()->route('ajout.demandedon')->with('success', 'Demande ajoutée avec succès.');
        } elseif ($user_type == 'responsable') {
            // Récupérer le centre hospitalier du responsable via la table d'association `fonction`
            $fonction = \App\Models\Fonction::where('responsable_id', $user->id)->first();
    
            if ($fonction) {
                $centreHospitalier = $fonction->centrehospitalier;
    
                if ($centreHospitalier) {
                    $lignedemandedon = new Lignedemandedon();
                    $lignedemandedon->centrehospitalier_id = $centreHospitalier->id;
                    $lignedemandedon->demandedon_id = $demandedon->id;
                    $lignedemandedon->datedemande = now()->toDateString();
                    $lignedemandedon->heuredemande = now()->toTimeString();
                    $lignedemandedon->save();
    
                    return redirect()->route('ajout.demandedon')->with('success', 'Demande ajoutée avec succès.');
                } else {
                    return redirect()->route('ajout.demandedon')->with('error', 'Centre hospitalier non trouvé pour le responsable.');
                }
            } else {
                return redirect()->route('ajout.demandedon')->with('error', 'Fonction non trouvée pour le responsable.');
            }
        }
    
        // Redirection ou réponse
        return redirect()->route('demandedon.index')->with('success', 'Demande envoyée et notifications créées.');
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
        $demandedon = Demandedon::findOrFail($id);
        // Récupérer tous les groupes sanguins pour le formulaire de modification
        $groupesanguin = Groupesanguin::all();
        return view('demandedon.edit', compact('demandedon', 'groupesanguin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nomdemandeur' => 'required|string',
            'statut' => 'required|string',
            'lieu' => 'required|string',
            'nbdonneurs' => 'required|integer',
            'groupesanguin_id' => 'required|exists:groupesanguins,id',
        ]);
    
        // Mettre à jour la demande de don
        $demandedon = Demandedon::findOrFail($id);
        $demandedon->nomdemandeur = $request->nomdemandeur;
        $demandedon->statut = $request->statut;
        $demandedon->lieu = $request->lieu;
        $demandedon->nbdonneurs = $request->nbdonneurs;
        $demandedon->groupesanguin_id = $request->groupesanguin_id;
        $demandedon->save();
    
        // Récupérer l'utilisateur connecté à partir de votre système d'authentification
        $user = session('user');
        $user_type = session('user_type');
    
        if (!$user) {
            return redirect()->route('edit.demandedon', $id)->with('error', 'Vous devez être connecté pour effectuer cette action.');
        }
    
        if ($user_type == 'donneur') {
            // Associer le donneur à la demande de don
            $lignedemande = Lignedemande::where('donneur_id', $user->id)->where('demandedon_id', $demandedon->id)->first();
            if (!$lignedemande) {
                $lignedemande = new Lignedemande();
            }
            $lignedemande->donneur_id = $user->id;
            $lignedemande->demandedon_id = $demandedon->id;
            $lignedemande->datedemande = now()->toDateString();
            $lignedemande->heuredemande = now()->toTimeString();
            $lignedemande->save();
            
            return redirect()->route('demandedon.index', $id)->with('success', 'Demande mise à jour avec succès.');
        } elseif ($user_type == 'responsable') {
            // Récupérer le centre hospitalier du responsable via la table d'association `fonction`
            $fonction = \App\Models\Fonction::where('responsable_id', $user->id)->first();
        
            if ($fonction) {
                $centreHospitalier = $fonction->centrehospitalier;
        
                if ($centreHospitalier) {
                    $lignedemandedon = Lignedemandedon::where('centrehospitalier_id', $centreHospitalier->id)->where('demandedon_id', $demandedon->id)->first();
                    if (!$lignedemandedon) {
                        $lignedemandedon = new Lignedemandedon();
                    }
                    $lignedemandedon->centrehospitalier_id = $centreHospitalier->id;
                    $lignedemandedon->demandedon_id = $demandedon->id;
                    $lignedemandedon->datedemande = now()->toDateString();
                    $lignedemandedon->heuredemande = now()->toTimeString();
                    $lignedemandedon->save();
        
                    return redirect()->route('demandedon.index', $id)->with('success', 'Demande mise à jour avec succès.');
                } 

    }}
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $demandedon = Demandedon::findOrFail($id);

    // Supprimer les associations avec les donneurs
    Lignedemande::where('demandedon_id', $demandedon->id)->delete();

    // Supprimer les associations avec les centres hospitaliers
    Lignedemandedon::where('demandedon_id', $demandedon->id)->delete();

    // Supprimer la demande de don
    $demandedon->delete();

    return redirect()->route('demandedon.index')->with('success', 'Demande de don supprimée avec succès.');
    }
}
