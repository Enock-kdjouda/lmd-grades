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
// test pour vérifier qu'un UE est ajouté
    public function test_ajout_ue()
    {
        $response = $this->post('/unites_enseignement', [
            'code' => 'UE01',
            'nom' => 'Programmation',
            'credits_ects' => 6,
            'semestre' => 1,
        ]);

        $response->assertRedirect('/unites_enseignement');
        $this->assertDatabaseHas('unites_enseignement', ['code' => 'UE01']);
    }
//test pour tester les fonctionnalités de modification
    public function test_update_ue()
    {
        $ue = UniteEnseignement::factory()->create();

        $response = $this->put(route('unites_enseignement.update', $ue->id), [
            'code' => 'UE12',
            'nom' => 'Nouveau Nom',
            'credits_ects' => 4,
            'semestre' => 2,
        ]);

        $response->assertRedirect(route('unites_enseignement.index'));
        $this->assertDatabaseHas('unites_enseignement', ['code' => 'UE12', 'nom' => 'Nouveau Nom']);
    }
// test pour tester les fonctionnalités de suppression
    public function test_delete_ue()
    {
        $ue = UniteEnseignement::factory()->create();

        $response = $this->delete(route('unites_enseignement.destroy', $ue->id));

        $response->assertRedirect(route('unites_enseignement.index'));
        $this->assertDatabaseMissing('unites_enseignement', ['id' => $ue->id]);
    }

}
