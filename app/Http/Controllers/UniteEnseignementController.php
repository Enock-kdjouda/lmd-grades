<?php

namespace App\Http\Controllers;

use App\Models\UniteEnseignement;
use Illuminate\Http\Request;

class UniteEnseignementController extends Controller
{
    public function index()
    {
        $ues = UniteEnseignement::all();
        return view('unites_enseignement.index', compact('ues'));
    }

    public function create()
    {
        return view('unites_enseignement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|regex:/^UE\d{2}$/|unique:unites_enseignement,code',
            'nom' => 'required|string|max:255',
            'credits_ects' => 'required|integer|min:1|max:30',
            'semestre' => 'required|integer|min:1|max:6',
        ]);

        UniteEnseignement::create($request->all());
        return redirect()->route('unites_enseignement.index');
    }
    public function edit($id)
    {
        $ue = UniteEnseignement::findOrFail($id);
        return view('unites_enseignement.edit' , compact('ue'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'code' => 'required|string|regex:/^UE\d{2}$/|unique:unites_enseignement,code',
            'nom' => 'required|string|max:255',
            'credits_ects' => 'required|integer|min:1|max:30',
            'semestre' => 'required|integer|min:1|max:6',
        ]);

        $unite = UniteEnseignement::findOrFail($id);
        $unite->update($validated);

        return redirect()->route('unites_enseignement.index')->with('success', 'UE mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $unite = UniteEnseignement::findOrFail($id);
        $unite->delete();

        return redirect()->route('unites_enseignement.index')->with('success', 'UE supprimée avec succès.');
    }

}
