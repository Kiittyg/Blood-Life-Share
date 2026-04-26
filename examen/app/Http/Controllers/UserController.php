<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Responsable;
use App\Models\Donneur;
use App\Models\Groupesanguin;
use App\Models\Localite;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $donneur=Donneur::with('groupesanguin')->get();
    $responsable = Responsable::all();
    
    return view('user.index', compact('donneur', 'responsable'));
        //return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $groupesanguin = Groupesanguin::all();
        
        // Récupérer toutes les localités
        $localite = Localite::all();
        
        // Passer les données à la vue
        return view('registerr', compact('groupesanguin', 'localite'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_type' => 'required|in:donneur,responsable',
            'nom' => 'required',
            'prenom' => 'required',
            'naissance' => 'required|date',
            'sexe' => 'required',
            'ville' => 'required',
            'telephone' => 'required',
            'email' => 'required|email|unique:' . ($request->user_type === 'donneur' ? 'donneurs' : 'responsables'),
            'login' => 'required|unique:' . ($request->user_type === 'donneur' ? 'donneurs' : 'responsables'),
            'motdepasse' => 'required|min:6',
        ]);

        if ($request->user_type === 'donneur') {
            $request->validate([
                'localite_id' => 'required|exists:localites,id',
                'groupesanguin_id'=>'required|exists:groupesanguins,id'
            ]);

            $donneur = new Donneur();
            $donneur->nom = $request->nom;
            $donneur->prenom = $request->prenom;
            $donneur->naissance = $request->naissance;
            $donneur->sexe = $request->sexe;
            $donneur->ville = $request->ville;
            $donneur->telephone = $request->telephone;
            $donneur->email = $request->email;
            $donneur->login = $request->login;
            $donneur->motdepasse = Hash::make($request->motdepasse);
            $donneur->groupesanguin_id = $request->groupesanguin_id;
            $donneur->localite_id = $request->localite_id;
            
            // Générer le code_unique après avoir sauvegardé l'utilisateur
$telephone_suffix = substr($donneur->telephone, -2);
// Extraire les trois premières lettres du prénom
$prenom_prefixe = substr($donneur->prenom, 0, 3);
// Concaténer les deux parties pour former le code_unique
$donneur->code_unique = $telephone_suffix . $prenom_prefixe;

// Sauvegarder le donneur en base de données
            $donneur->save();
            Auth::login($donneur);
           
            session(['user' => $donneur, 'user_type' => 'donneur', 'newly_registered' => true]);
            return redirect()->route('home')->with('success', 'Donneur ajouté avec succès');
            
        } else {
            $request->validate([
                'boite_postale' => 'required',
                'fonction' => 'required',
            ]);

            $responsable = new Responsable();
            $responsable->nom = $request->nom;
            $responsable->prenom = $request->prenom;
            $responsable->naissance = $request->naissance;
            $responsable->sexe = $request->sexe;
            $responsable->ville = $request->ville;
            $responsable->telephone = $request->telephone;
            $responsable->email = $request->email;
            $responsable->boite_postale = $request->boite_postale;
            $responsable->login = $request->login;
            $responsable->motdepasse = Hash::make($request->motdepasse);
            $responsable->fonction = $request->fonction;

            // Générer le code_unique après avoir sauvegardé l'utilisateur
            $telephone_suffix = substr($responsable->telephone, -2);
// Extraire les trois premières lettres du prénom
$prenom_prefixe = substr($responsable->prenom, 0, 2);
// Concaténer les deux parties pour former le code_unique
 $responsable->code_unique = $telephone_suffix . $prenom_prefixe;
 $responsable->save();

Auth::login($responsable);
         
            session(['user' => $responsable, 'user_type' => 'responsable', 'newly_registered' => true]);
          
            return redirect('centrehospitalier.create')->with('success', 'Utilisateur ajouté avec succès');
    }
}   

    
   
     /* Display the specified resource.
     */
    public function show()
    {
        $user = session('user');
        $user_type = session('user_type');

        if (!$user) {
            return redirect()->route('loginn')->with('error', 'Vous devez être connecté pour accéder à cette page.');
        }

        return view('user.show', ['user' => $user, 'user_type' => $user_type]);
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


    public function showCurrentUser()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user(); // Récupère l'utilisateur connecté

      

        // Selon le type d'utilisateur, vous pouvez récupérer des informations supplémentaires si nécessaire
        $userDetails = null;
        if ($user->user_type === 'donneur') {
            $userDetails = Donneur::where('login', $user->login)->first();
        } elseif ($user->user_type === 'responsable') {
            $userDetails = Responsable::where('login', $user->login)->first();
        }
        
        // Passer l'utilisateur à la vue
        return view('user.showcurrent', compact('user','userDetails'));
    }
    
}
