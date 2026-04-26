<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Donneur;
use App\Models\Responsable;
use App\Models\Demandedon;
class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = session('user');
        $user_type = session('user_type');
    
        if (!$user) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour voir les notifications.');
        }
    
        // Récupération des notifications pour le donneur ou le responsable
        if ($user_type == 'donneur' || $user_type == 'responsable') {
            $notifications = $user->notifications;
        } else {
            $notifications = collect();
        }
    
        return view('notifications.index', compact('notifications'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $donneurs = Donneur::where('groupesanguin_id', $request->groupesanguin_id)
                           ->where('id', '!=', $userToExclude)
                           ->get();
        foreach ($donneurs as $donneur) {
            $donneur->notifications()->save($notification);
        }
    
        // Envoi des notifications aux responsables, sauf celui qui a fait la demande
        $responsables = Responsable::where('id', '!=', $userToExclude)->get();
        foreach ($responsables as $responsable) {
            $responsable->notifications()->save($notification);
        }
    
        // Gestion spécifique selon le type d'utilisateur
        if ($user_type == 'donneur') {
            $lignedemande = new Lignedemande();
            $lignedemande->donneur_id = $user->id;
            $lignedemande->demandedon_id = $demandedon->id;
            $lignedemande->datedemande = now()->toDateString();
            $lignedemande->heuredemande = now()->toTimeString();
            $lignedemande->save();
    
            // Associer la notification au donneur
            $user->notifications()->save($notification);
    
            return redirect()->route('ajout.demandedon')->with('success', 'Demande ajoutée avec succès.');
        }
    
        if ($user_type == 'responsable') {
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
    
                    // Associer la notification au responsable
                    $user->notifications()->save($notification);
    
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
