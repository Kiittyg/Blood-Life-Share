<?php

namespace App\Http\Controllers;
use App\Models\Fonction;
use App\Models\Responsable;
use App\Models\Centrehospitalier;
use Illuminate\Http\Request;

class FonctionController extends Controller
{
    /**
     * Display a listing of the resource.
      
     */
    public function index()
    {
        $fonction = Fonction::all();
        $centrehospitalier = Centrehospitalier::all();
        $responsable = Responsable::all();
        return view('fonction.index',compact('fonction','centrehospitalier','responsable'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centrehospitalier= Centrehospitalier::all();
        $responsable = Responsable::all();
        return view('fonction.create', compact('centrehospitalier','responsable'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fonction = new Fonction;
        $fonction->centrehospitalier_id = $request->centrehospitalier_id;
        $fonction->responsable_id = $request->responsable_id;
        $fonction->datedebut = $request->datedebut;
        $fonction->datefin = $request->datefin;
        $fonction->save();
        return redirect()->route('home')->with('success','Successfully');
       
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
        $fonction = Fonction::findOrFail($id);
        $centrehospitalier = Centrehospitalier::all();
        $responsable = Responsable::all();
        return view('fonction.edit', compact('fonction','centrehospitalier','responsable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fonction = Fonction::find($id);
        $fonction->centrehospitalier_id = $request->centrehospitalier_id;
        $fonction->responsable_id = $request->responsable_id;
        $fonction->datedebut = $request->datedebut;
        $fonction->datefin = $request->datefin;
        $fonction->update();
        return redirect()->route('fonction.index')->with('success','Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fonction= Fonction::find($id);
        $fonction->delete();
        return redirect()->route('fonction.index')->with('success', 'Successfully');
    }
}
