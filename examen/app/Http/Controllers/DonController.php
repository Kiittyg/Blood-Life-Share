<?php

namespace App\Http\Controllers;
use App\Models\Don;
use App\Models\Centrehospitalier;
use Illuminate\Http\Request;

class DonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$don = Don::all();
        //return view('don.index', compact('don'));
        $centrehospitalier = Centrehospitalier::all();
        $don = Don::all();
        return view('don.index', compact('don', 'centrehospitalier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //return view('don.create');
       /* $centrehospitalier = Centrehospitalier::all();
        return view('don.create', compact('centrehospitalier'));*/
        $user = session('user');
        $user_type = session('user_type');

        if (!$user) {
            return redirect('/')->with('error', 'Vous devez être connecté pour effectuer cette action.');
        }

        // Vérifiez si l'utilisateur est de type 'responsable'
        if ($user_type !== 'responsable') {
            return redirect('/')->with('error', 'Vous n\'avez pas accès à cette page.');
        }

        $centrehospitalier = Centrehospitalier::all();
        return view('don.create', compact('centrehospitalier'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = session('user');
        $user_type = session('user_type');

        if (!$user) {
            return redirect('/')->with('error', 'Vous devez être connecté pour effectuer cette action.');
        }

        // Vérifiez si l'utilisateur est de type 'responsable'
        if ($user_type !== 'responsable') {
            return redirect('/')->with('error', 'Vous n\'avez pas accès à cette page.');
        }

        $don = new Don();
        $don->centrehospitalier_id = $request->centrehospitalier_id;
        // Autres champs du don
        $don->save();

        // Stocker les informations dans la session
        session([
            'don_id' => $don->id,
            'centrehospitalier_id' => $request->centrehospitalier_id,
        ]);

        // Rediriger vers la page de création de Lignedon
        return redirect()->route('enregistrer.lignedon');
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
        $centrehospitalier = Centrehospitalier::all();
        $don = Don::findOrFail($id);
        return view('don.edit', compact('don','centrehospitalier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $don = Don::find($id);
        $centrehospitalier = Centrehospitalier::all();
        $don->centrehospitalier_id = $request->centrehospitalier_id;
        $don->update();
        return redirect()->route('don.index')->with('success','Mis a jour reussi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $don= Don::find($id);
        $centrehospitalier->delete();
        return redirect()->route('don.index')->with('success', 'Successfully');
    }
}
