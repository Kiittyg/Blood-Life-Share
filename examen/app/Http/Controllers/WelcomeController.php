<?php

namespace App\Http\Controllers;
use App\Models\Donneur;
use Illuminate\Support\Facades\Auth;
use App\Models\Responsable;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user instanceof Donneur) {
            // Utilisateur connecté est un donneur
            $donneur_id = $user->donneur_id;
            $nom = $user->nom;
            // ... autres traitements spécifiques aux donneurs
            return view('welcome_donneur', compact('donneur_id', 'nom'));
        } elseif ($user instanceof Responsable) {
            // Utilisateur connecté est un responsable
            $responsable_id = $user->responsable_id;
            $nom = $user->nom;
            // ... autres traitements spécifiques aux responsables
            return view('welcome_responsable', compact('responsable_id', 'nom'));
        } else {
            // Autre type d'utilisateur ou non connecté
            // Gérer le cas où l'utilisateur n'est ni un donneur ni un responsable
            return view('login');
        }
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
        //
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
