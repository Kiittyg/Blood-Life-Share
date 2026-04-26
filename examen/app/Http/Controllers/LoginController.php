<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Donneur;
use App\Models\Responsable;
class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
{
    return view('loginn');

}   
public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'motdepasse' => 'required',
        ]);

        $login = $request->input('login');
        $password = $request->input('motdepasse');

        // Vérifier dans la table des donneurs
        $donneur = Donneur::where('login', $login)->first();
        if ($donneur && Hash::check($password, $donneur->motdepasse)) {
            Auth::login($donneur);
            session(['user' => $donneur, 'user_type' => 'donneur']);
            return redirect()->route('home')->with('success', 'Connexion réussie en tant que donneur');
        }

        // Vérifier dans la table des responsables
        $responsable = Responsable::where('login', $login)->first();
        if ($responsable && Hash::check($password, $responsable->motdepasse)) {
            Auth::login($responsable);
            session(['user' => $responsable, 'user_type' => 'responsable']);
            return redirect()->route('home')->with('success', 'Connexion réussie en tant que responsable');
        }

        // Si les informations d'identification sont incorrectes
        return back()->with('error', 'Les informations de connexion ne sont pas correctes.');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('loginn')->with('success', 'Déconnexion réussie.');
    }
public function index()
    {
       
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
    public function show()
    {
        $user = session('user');
        $user_type = session('user_type');

        if (!$user) {
            return redirect()->route('loginn')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        return view('login.show', ['user' => $user, 'user_type' => $user_type]);
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
