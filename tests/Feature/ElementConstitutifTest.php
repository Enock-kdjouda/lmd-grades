<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\UniteEnseignement;


class ElementConstitutifTest extends TestCase
{
    use RefreshDatabase;

// test de création d'un EC avec coefficient
    public function test_creation_ec_avec_coefficient()
    {
        $ec = \App\Models\ElementConstitutif::factory()->create([
            'nom' => 'Structures de Données',
            'coefficient' => 3,
        ]);

        $this->assertDatabaseHas('elements_constitutifs', [
            'nom' => 'Structures de Données',
            'coefficient' => 3,
        ]);
    }

//  test de vérification du rattachement à UE
    public function test_rattachement_ec_a_une_ue()
    {
        $ue = \App\Models\UniteEnseignement::factory()->create();
        $ec = \App\Models\ElementConstitutif::factory()->create(['ue_id' => $ue->id]);

        $this->assertEquals($ec->ue_id, $ue->id);
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

// test de validation du coefficient 
    public function test_validation_coefficient()
    {
        $response = $this->post('/elements_constitutifs', [
            'nom' => 'Bases de Données',
            'coefficient' => 6, // Valeur invalide
        ]);

        $response->assertSessionHasErrors(['coefficient']);
    }

//test pour la suppression d'un EC
    public function test_suppression_ec()
    {
        $ec = \App\Models\ElementConstitutif::factory()->create();
        $ec->delete();
        // Vérifie que l'EC a bien été supprimée de la base de données
        $this->assertDatabaseMissing('elements_constitutifs', [
            'id' => $ec->id,
        ]);
    }



}
