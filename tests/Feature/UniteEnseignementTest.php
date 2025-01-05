<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\UniteEnseignement;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UniteEnseignementTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    use RefreshDatabase;

//test de création d'une UE valide
    public function test_creation_ue_valide()
    {
        $ue = \App\Models\UniteEnseignement::factory()->create([
            'code' => 'UE11',
            'nom' => 'Informatique Fondamentale',
            'credits_ects' => 6,
            'semestre' => 1,
        ]);

        $this->assertDatabaseHas('unites_enseignement', [
            'code' => 'UE11',
            'nom' => 'Informatique Fondamentale',
            'credits_ects' => 6,
            'semestre' => 1,
        ]);
    }

// test d'association des EC à une UE
    public function test_association_ecs_a_une_ue()
    {
        $ue = \App\Models\UniteEnseignement::factory()->create();
        $ec = \App\Models\ElementConstitutif::factory()->create(['ue_id' => $ue->id]);

        $this->assertEquals($ec->ue_id, $ue->id);
    }

// test de vérification des crédits_ects
    public function test_verification_credits_ects()
    {
        $response = $this->post('/unites_enseignement', [
            'code' => 'UE12',
            'nom' => 'Analyse Mathématique',
            'credits_ects' => 40, // Valeur invalide
            'semestre' => 2,
        ]);

        $response->assertSessionHasErrors(['credits_ects']);
    }
// test de validation du code UE
    public function test_validation_code_ue()
    {
        $response = $this->post('/unites_enseignement', [
            'code' => 'INVALID_CODE',
            'nom' => 'Programmation Avancée',
            'credits_ects' => 5,
            'semestre' => 2,
        ]);

        $response->assertSessionHasErrors(['code']);
    }
// test de vérification du semestre
    
    public function test_verification_semestre()
    {
        $response = $this->post('/unites_enseignement', [
            'code' => 'UE15',
            'nom' => 'Algèbre',
            'credits_ects' => 4,
            'semestre' => 8, // Valeur invalide
        ]);

        $response->assertSessionHasErrors(['semestre']);
    }


    




}
