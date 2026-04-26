<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Lignedon;
use App\Models\Don;
use App\Models\Donneur;
use App\Models\Responsable;
use App\Models\Centrehospitalier;

use Illuminate\Http\Request;

class LignedonController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        $don = Don::all();
        $donneur = Donneur::all();
        $lignedon = Lignedon::all();
        return view('lignedon.index',compact('lignedon','don','donneur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = session('user');
    $user_type = session('user_type');

    // Vérifiez si l'utilisateur est connecté
    if (!$user) {
        return redirect()->route('ajout.demandedon')->with('error', 'Vous devez être connecté pour effectuer cette action.');
    }

    // Vérifiez si l'utilisateur est de type 'responsable'
    if ($user_type !== 'responsable') {
        return redirect('/')->with('error', 'Vous n\'avez pas accès à cette page.');
    }

    // Logique pour obtenir les données nécessaires et afficher le formulaire
    $don = Don::all();
    $donneur = Donneur::all();
    $donId = session('don_id');
    $centrehospitalierId = session('centrehospitalier_id');

    return view('lignedon.create', compact('don', 'donneur', 'donId', 'centrehospitalierId'));
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*$lignedon = new Lignedon;
        $lignedon->don_id = $request->don_id;
        $lignedon->donneur_id = $request->donneur_id;
        $lignedon->nbfois = $request->nbfois;
        $lignedon->qualite = $request->qualite;
        $lignedon->quantite = $request->quantite;
        $lignedon->save();
        return redirect()->route('lignedon.index')->with('success', 'Ligne de don ajoutée avec succès.');*/
        $user = session('user');
    $user_type = session('user_type');

    // Vérifiez si l'utilisateur est connecté
    if (!$user) {
        return redirect()->route('ajout.demandedon')->with('error', 'Vous devez être connecté pour effectuer cette action.');
    }

    // Vérifiez si l'utilisateur est de type 'responsable'
    if ($user_type !== 'responsable') {
        return redirect('/')->with('error', 'Vous n\'avez pas accès à cette page.');
    }

    // Créez une nouvelle ligne de don
    $lignedon = new Lignedon;
    $lignedon->don_id = $request->don_id;
    $lignedon->donneur_id = $request->donneur_id;
    $lignedon->nbfois = $request->nbfois;
    $lignedon->qualite = $request->qualite;
    $lignedon->quantite = $request->quantite;
    $lignedon->save();

    return redirect()->route('lignedon.index')->with('success', 'Ligne de don ajoutée avec succès.');
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
        /*$lignedon = Lignedon::findOrFail($id);
        $donneur = Donneur::all();
        $don = Don::all();
        return view('lignedon.edit', compact('lignedon','donneur','don'));*/
        $user = session('user');
        $user_type = session('user_type');

        // Vérifiez si l'utilisateur est connecté
        if (!$user) {
            return redirect()->route('ajout.demandedon')->with('error', 'Vous devez être connecté pour effectuer cette action.');
        }

        // Vérifiez si l'utilisateur est de type 'responsable'
        if ($user_type !== 'responsable') {
            return redirect('/')->with('error', 'Vous n\'avez pas accès à cette page.');
        }

        // Récupérez les données nécessaires pour l'édition
        $lignedon = Lignedon::findOrFail($id);
        $donneur = Donneur::all();
        $don = Don::all();

        return view('lignedon.edit', compact('lignedon', 'donneur', 'don'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        /*$lignedon = Lignedon::find($id);
        $lignedon->don_id = $request->don_id;
        $lignedon->donneur_id = $request->donneur_id;
        $lignedon->nbfois= $request->nbfois;
        $lignedon->qualite= $request->qualite;
        $lignedon->quantite = $request->quantite;
        $lignedon->update();
        return redirect()->route('lignedon.index')->with('success','Successfully');*/
         $user = session('user');
        $user_type = session('user_type');

        // Vérifiez si l'utilisateur est connecté
        if (!$user) {
            return redirect()->route('ajout.demandedon')->with('error', 'Vous devez être connecté pour effectuer cette action.');
        }

        // Vérifiez si l'utilisateur est de type 'responsable'
        if ($user_type !== 'responsable') {
            return redirect('/')->with('error', 'Vous n\'avez pas accès à cette page.');
        }

        // Mettez à jour la ligne de don
        $lignedon = Lignedon::findOrFail($id);
        $lignedon->don_id = $request->don_id;
        $lignedon->donneur_id = $request->donneur_id;
        $lignedon->nbfois = $request->nbfois;
        $lignedon->qualite = $request->qualite;
        $lignedon->quantite = $request->quantite;
        $lignedon->save();

        return redirect()->route('lignedon.index')->with('success', 'Ligne de don mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lignedon= Lignedon::find($id);
        $lignedon->delete();
        return redirect()->route('lignedon.index')->with('success', 'Successfully');
    }
}
