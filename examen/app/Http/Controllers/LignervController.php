<?php

namespace App\Http\Controllers;
use App\Models\Lignerv;
use Illuminate\Support\Facades\Auth;
use App\Models\Donneur;
use App\Models\Rendezvous;
use App\Models\Demandedon;
use Illuminate\Http\Request;

class LignervController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
       // $lignerv = Lignerv::all();
        //$donneur = Donneur::all();
        //$rendezvous = Rendezvous::all();
        //return view('lignerv.index',compact('lignerv','donneur','rendezvous'));

        $lignerv = Lignerv::where('donneur_id', Auth::id())->get();
        return view('lignerv.index', compact('lignerv'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //$donneur= Donneur::all();
        //$rendezvous = Rendezvous::all();
       // return view('lignerv.create', compact('donneur','rendezvous'));
       $user = session('user');
        $user_type = session('user_type');
       if ($user->user_type == 'responsable') {
           return redirect('/')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page.');
       }

       $demandedon_id = $request->input('demandedon_id');
    return view('lignerv.create', compact('demandedon_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
        $request->validate([
            'daterv' => 'required|date',
            'heurerv' => 'required|date_format:H:i',
            'demandedon_id' => 'required|exists:demandedons,id',
        ]);
    
        try {
            $rendezvous = new Rendezvous;
            $rendezvous->demandedon_id = $request->demandedon_id;
            $rendezvous->save();
        } catch (\Exception $e) {
            return redirect()->route('lignerv.index')->with('error', 'Erreur lors de la création du rendez-vous.');
        }
    
        $lignerv = new Lignerv;
        $lignerv->donneur_id = Auth::id();
        $lignerv->rendezvous_id = $rendezvous->id;
        $lignerv->daterv = $request->daterv;
        $lignerv->heurerv = $request->heurerv;
        $lignerv->save();
    
        return redirect()->route('lignerv.index')->with('success', 'Rendez-vous pris avec succès');
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
        /*$lignerv = Lignerv::findOrFail($id);
        $donneur = Donneur::all();
        $rendezvous = Rendezvous::all();
        return view('lignerv.edit', compact('lignerv','donneur','rendezvous'));*/
        $lignerv = Lignerv::findOrFail($id);
        return view('lignerv.edit', compact('lignerv')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       /* $lignerv = Lignerv::find($id);
        $lignerv->rendezvous_id = $request->rendezvous_id;
        $lignerv->donneur_id = $request->donneur_id;
        $lignerv->daterv= $request->daterv;
        $lignerv->heurerv = $request->heurerv;
        $lignerv->update();
        return redirect()->route('lignerv.index')->with('success','Successfully');*/
        $request->validate([
            'daterv' => 'required|date',
            'heurerv' => 'required|date_format:H:i',
        ]);

        $lignerv = Lignerv::findOrFail($id);
        $lignerv->daterv = $request->daterv;
        $lignerv->heurerv = $request->heurerv;
        $lignerv->save();

        return redirect()->route('lignerv.index')->with('success', 'Rendez-vous mis à jour avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        /*$lignerv= Lignerv::find($id);
        $lignerv->delete();
        return redirect()->route('lignerv.index')->with('success', 'Successfully');*/
        $lignerv = Lignerv::findOrFail($id);
        $lignerv->delete();
        return redirect()->route('lignerv.index')->with('success', 'Rendez-vous supprimé avec succès');
    }
}
