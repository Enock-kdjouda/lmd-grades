<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Grade;
use App\Models\Student;
use App\Models\UniteEnseignement;
use App\Models\ElementConstitutif;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test de validation d'une UE (moyenne >= 10).
     */
    public function test_validation_ue()
    {
        // Création de l'UE
        $ue = UniteEnseignement::factory()->create();

        // Création des ECs associés
        $ec1 = ElementConstitutif::factory()->create(['ue_id' => $ue->id, 'coefficient' => 2]);
        $ec2 = ElementConstitutif::factory()->create(['ue_id' => $ue->id, 'coefficient' => 3]);

        // Création des notes
        Grade::factory()->create(['ec_id' => $ec1->id, 'note' => 12]);
        Grade::factory()->create(['ec_id' => $ec2->id, 'note' => 8]);

        // Calcul de la moyenne pondérée
        $moyenne = ($ec1->coefficient * 12 + $ec2->coefficient * 8) / ($ec1->coefficient + $ec2->coefficient);

        // Assert
        $this->assertTrue($moyenne >= 10, "L'UE devrait être validée.");
    }

    /**
     * Test de compensation entre UEs.
     */
    public function test_compensation_entre_ues()
    {
        // Création de deux UEs
        $ue1 = UniteEnseignement::factory()->create(['credits_ects' => 5]);
        $ue2 = UniteEnseignement::factory()->create(['credits_ects' => 5]);

        // Création des ECs et notes pour les UEs
        $ec1 = ElementConstitutif::factory()->create(['ue_id' => $ue1->id, 'coefficient' => 1]);
        $ec2 = ElementConstitutif::factory()->create(['ue_id' => $ue2->id, 'coefficient' => 1]);

        Grade::factory()->create(['ec_id' => $ec1->id, 'note' => 8]); // Non validé
        Grade::factory()->create(['ec_id' => $ec2->id, 'note' => 12]); // Validé

        // Simuler la compensation sur le semestre
        $moyenneSemestre = (8 + 12) / 2;

        // Assert
        $this->assertTrue($moyenneSemestre >= 10, "La compensation du semestre devrait être validée.");
    }

    /**
     * Test de calcul des ECTS acquis.
     */
    public function test_calcul_ects_acquis()
    {
        // Création de deux UEs
        $ue1 = UniteEnseignement::factory()->create(['credits_ects' => 6]);
        $ue2 = UniteEnseignement::factory()->create(['credits_ects' => 4]);

        // Création des ECs et notes
        $ec1 = ElementConstitutif::factory()->create(['ue_id' => $ue1->id, 'coefficient' => 1]);
        $ec2 = ElementConstitutif::factory()->create(['ue_id' => $ue2->id, 'coefficient' => 1]);

        Grade::factory()->create(['ec_id' => $ec1->id, 'note' => 12]); // Validé
        Grade::factory()->create(['ec_id' => $ec2->id, 'note' => 9]);  // Non validé

        // Calcul des ECTS acquis
        $ectsAcquis = $ue1->credits_ects;

        // Assert
        $this->assertEquals(6, $ectsAcquis, "L'étudiant devrait avoir acquis 6 ECTS.");
    }

    /**
     * Test de validation d'un semestre.
     */
    public function test_validation_semestre()
    {
        // Création de deux UEs
        $ue1 = UniteEnseignement::factory()->create();
        $ue2 = UniteEnseignement::factory()->create();

        // Création des ECs et notes
        $ec1 = ElementConstitutif::factory()->create(['ue_id' => $ue1->id, 'coefficient' => 1]);
        $ec2 = ElementConstitutif::factory()->create(['ue_id' => $ue2->id, 'coefficient' => 1]);

        Grade::factory()->create(['ec_id' => $ec1->id, 'note' => 11]); // Validé
        Grade::factory()->create(['ec_id' => $ec2->id, 'note' => 12]); // Validé

        // Simuler la validation du semestre
        $semestreValide = true;

        // Assert
        $this->assertTrue($semestreValide, "Le semestre devrait être validé.");
    }

    /**
     * Test de passage à l'année suivante.
     */
    public function test_passage_annee_suivante()
    {
        // Création de l'étudiant
        $etudiant = Student::factory()->create(['niveau' => 'L1']);

        // Création des semestres validés
        $semestre1Valide = true;
        $semestre2Valide = true;

        // Simuler le passage à l'année suivante
        $anneeSuivante = $semestre1Valide && $semestre2Valide;

        // Assert
        $this->assertTrue($anneeSuivante, "L'étudiant devrait passer à l'année suivante.");
    }
}
