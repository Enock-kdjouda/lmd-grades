<?php

namespace App\Http\Controllers;

use App\Models\ElementConstitutif;
use App\Models\UniteEnseignement;
use Illuminate\Http\Request;

class ElementConstitutifController extends Controller
{
    public function index()
    {
        $ecs = ElementConstitutif::with('uniteEnseignement')->get();
        return view('elements_constitutifs.index', compact('ecs'));
    }

    public function create()
    {
        $ues = UniteEnseignement::all(); // Pour remplir le champ UE
        return view('elements_constitutifs.create', compact('ues'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:elements_constitutifs',
            'nom' => 'required',
            'coefficient' => 'required|numeric|min:0',
            'ue_id' => 'required|exists:unites_enseignement,id',
        ]);

        ElementConstitutif::create($request->all());
        return redirect()->route('elements_constitutifs.index');
    }
    public function edit($id)
    {
        $ec = ElementConstitutif::findOrFail($id);
        $ues = UniteEnseignement::all(); // Récupère toutes les UEs pour le formulaire
        return view('elements_constitutifs.edit', compact('ec', 'ues'));
    }
    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'code' => 'required|max:255',
            'nom' => 'required|max:255',
            'coefficient' => 'required|numeric|min:1',
            'ue_id' => 'required|exists:unites_enseignement,id',
        ]);
    
        $ec = ElementConstitutif::findOrFail($id);
        $ec->update($validated);
    
        return redirect()->route('elements_constitutifs.index')->with('success', 'EC mis à jour avec succès.');
    }
    
    public function destroy($id)
    {
        $ec = ElementConstitutif::findOrFail($id);
        $ec->delete();
    
        return redirect()->route('elements_constitutifs.index')->with('success', 'EC supprimé avec succès.');
    }
    
}
