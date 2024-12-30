<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\UniteEnseignement;


class ElementConstitutifTest extends TestCase
{
    use RefreshDatabase;
// test pour vérifier qu'un EC est ajouté
    public function test_ajout_ec()
    {
       $ue = \App\Models\UniteEnseignement::factory()->create();
       $ec = \App\Models\ElementConstitutif::factory()->create(['ue_id' => $ue->id]);

    // Vérifie que l'EC est dans la base de données
    $this->assertDatabaseHas('elements_constitutifs', [
        'id' => $ec->id,
        'code' => $ec->code,
        'nom' => $ec->nom,
        'ue_id' => $ue->id,
    ]);
    }
//test pour la modification d'un EC
    
    public function test_modification_ec()
    {
        // Crée une EC associée à une UE
        $ec = \App\Models\ElementConstitutif::factory()->create();

        // Modifie certaines propriétés de l'EC
        $nouveauNom = 'EC Modifié';
        $nouveauCoefficient = 4;

        $ec->update([
            'nom' => $nouveauNom,
            'coefficient' => $nouveauCoefficient,
        ]);

        // Vérifie dans la base de données que les modifications ont été prises en compte
        $this->assertDatabaseHas('elements_constitutifs', [
            'id' => $ec->id,
            'nom' => $nouveauNom,
            'coefficient' => $nouveauCoefficient,
        ]);
    }
//test pour la suppression d'un EC
    public function test_suppression_ec()
    {
        // Crée une EC associée à une UE
        $ec = \App\Models\ElementConstitutif::factory()->create();

        // Supprime l'EC
        $ec->delete();

        // Vérifie que l'EC a bien été supprimée de la base de données
        $this->assertDatabaseMissing('elements_constitutifs', [
            'id' => $ec->id,
        ]);
    }

}
