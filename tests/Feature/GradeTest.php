<?php

namespace Tests\Feature;

use App\Models\Grade; 
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GradeTest extends TestCase // Renommer le nom de la classe de NoteTest à GradeTest
{
    use RefreshDatabase;

    private Student $student;

    protected function setUp(): void
    {
        parent::setUp();

        // Créer un étudiant pour les tests
        $this->student = Student::factory()->create([
            'numero_etudiant' => 'E12345',
            'nom' => 'Doe',
            'prenom' => 'John',
            'niveau' => 'L1'
        ]);
    }

    /** @test */
    public function ajout_grade_valide()
    {
        $gradeData = [
            'etudiant_id' => $this->student->id,
            'elements_constitutifs_id' => 1,
            'note' => 15.5,
            'session' => 'normale',
            'date_evaluation' => '2024-01-15'
        ];

        $grade = Grade::create($gradeData); 

        $this->assertDatabaseHas('notes', $gradeData); // Utiliser la table grades
        $this->assertEquals(15.5, $grade->note);
    }

    /** @test */
    public function verification_limite()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $gradeData = [
            'etudiant_id' => $this->student->id,
            'elements_constitutifs_id' => 1,
            'note' => 21, // Note invalide
            'session' => 'normale',
            'date_evaluation' => '2024-01-15'
        ];

        Grade::create($gradeData); // Utiliser Grade au lieu de Note
    }

    /** @test */
    public function calculer_moyenne()
    {
        // Créer plusieurs notes pour un même UE
        Grade::create([
            'etudiant_id' => $this->student->id,
            'elements_constitutifs_id' => 1,
            'note' => 15,
            'session' => 'normale',
            'date_evaluation' => '2024-01-15'
        ]);

        Grade::create([
            'etudiant_id' => $this->student->id,
            'elements_constitutifs_id' => 1,
            'note' => 17,
            'session' => 'normale',
            'date_evaluation' => '2024-01-15'
        ]);

        $average = $this->student->grades()->avg('note'); // Utiliser la relation avec grades
        $this->assertEquals(16, $average);
    }

    /** @test */
    public function gestion_des_sessions()
    {
        // Grade de session normale
        $normalGrade = Grade::create([
            'etudiant_id' => $this->student->id,
            'elements_constitutifs_id' => 1,
            'note' => 8,
            'session' => 'normale',
            'date_evaluation' => '2024-01-15'
        ]);

        // Grade de rattrapage
        $rattrapageGrade = Grade::create([
            'etudiant_id' => $this->student->id,
            'elements_constitutifs_id' => 1,
            'note' => 12,
            'session' => 'rattrapage',
            'date_evaluation' => '2024-06-15'
        ]);

        $this->assertEquals('normale', $normalGrade->session);
        $this->assertEquals('rattrapage', $rattrapageGrade->session);
    }

    /** @test */
    public function validation_grades_manquantes()
    {
        $elementIds = [1, 2, 3]; // IDs des éléments constitutifs attendus
        
        // Créer seulement deux grades
        Grade::create([
            'etudiant_id' => $this->student->id,
            'elements_constitutifs_id' => 1,
            'note' => 15,
            'session' => 'normale',
            'date_evaluation' => '2024-01-15'
        ]);

        Grade::create([
            'etudiant_id' => $this->student->id,
            'elements_constitutifs_id' => 2,
            'note' => 16,
            'session' => 'normale',
            'date_evaluation' => '2024-01-15'
        ]);

        $existingGradeElements = Grade::where('etudiant_id', $this->student->id)
            ->pluck('elements_constitutifs_id')
            ->toArray();

        $missingElements = array_diff($elementIds, $existingGradeElements);

        $this->assertCount(1, $missingElements);
        $this->assertEquals([3], array_values($missingElements));
    }
}
