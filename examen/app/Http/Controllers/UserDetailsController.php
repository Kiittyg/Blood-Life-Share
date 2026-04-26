<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class UserDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Récupérer l'ID de l'utilisateur connecté à partir de votre système d'authentification
        if (Session::has('user')) {
            $user = Session::get('user');
            $userId = $user->id;

            // Vérifiez si l'utilisateur est un donneur
            $userDonneur = DB::table('donneurs')
                            ->where('user_id', $userId)
                            ->first();

            // Vérifiez si l'utilisateur est un responsable
            $userResponsable = DB::table('responsables')
                                ->where('user_id', $userId)
                                ->first();

            // Déterminez le type d'utilisateur
            if ($userDonneur) {
                $userType = 'Donneur';
            } elseif ($userResponsable) {
                $userType = 'Responsable';
            } else {
                $userType = 'Inconnu';
            }

            // Retourner les informations de l'utilisateur
            return response()->json([
                'userId' => $userId,
                'userType' => $userType,
                'nom' => $user->nom,
                'email' => $user->email
            ]);
        } else {
            // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
            return redirect()->route('loginn')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }
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
