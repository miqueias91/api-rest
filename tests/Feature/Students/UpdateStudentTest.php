<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Student\Models\Student;

use function Pest\Laravel\putJson;

uses(RefreshDatabase::class);

describe('Update Student API', function () {

    it('can update an existing student with authentication', function () {
        authenticate();

        $student = createStudent();

        $payload = [
            'name' => 'Updated Student',
            'email' => 'updatedstudent@email.com',
        ];

        $response = putJson('api/v1/students/'.$student->uuid, $payload)
            ->assertOk()
            ->assertJsonStructure(['id', 'name', 'email', 'created_at', 'updated_at']);

        expect($response->json('name'))->toBe('Updated Student');
        expect($response->json('email'))->toBe('updatedstudent@email.com');

        // Verificar persistência no banco de dados
        $this->assertDatabaseHas('students', [
            'uuid' => $student->uuid,
            'name' => 'Updated Student',
            'email' => 'updatedstudent@email.com',
        ]);
    });

    it('can not update a student without authentication', function () {
        $student = createStudent();

        $payload = [
            'name' => 'Unauthorized Student',
            'email' => 'unauthstudent@email.com',
        ];

        putJson('api/v1/students/'.$student->uuid, $payload)
            ->assertUnauthorized()
            ->assertJson(['message' => 'Token not provided']);
    });

    it('can not update a student with an empty email', function () {
        authenticate();

        $student = createStudent();

        $payload = [
            'name' => 'Test Student',
            'email' => null,
        ];

        putJson('api/v1/students/'.$student->uuid, $payload)
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['email']);
    });

    it('can not update a student with an existing email', function () {
        authenticate();

        // Criar outro estudante com o e-mail que será usado no teste
        Student::create([
            'name' => 'Existing Student',
            'email' => 'existing@email.com',
        ]);

        $student = createStudent();

        $payload = [
            'name' => 'Test Student',
            'email' => 'existing@email.com',
        ];

        putJson('api/v1/students/'.$student->uuid, $payload)
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['email']);
    });

    it('can not update a student with invalid email format', function () {
        authenticate();

        $student = createStudent();

        $payload = [
            'name' => 'Test Student',
            'email' => 'invalid-email',
        ];

        putJson('api/v1/students/'.$student->uuid, $payload)
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['email']);
    });

    it('can not update a student with a name that is too long', function () {
        authenticate();

        $student = createStudent();

        $payload = [
            'name' => str_repeat('A', 256),
            'email' => 'teststudent@email.com',
        ];

        putJson('api/v1/students/'.$student->uuid, $payload)
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    });

    it('can not update a student with a name that is too short', function () {
        authenticate();

        $student = createStudent();

        $payload = [
            'name' => 'A', // Nome muito curto
            'email' => 'teststudent@email.com',
        ];

        putJson('api/v1/students/'.$student->uuid, $payload)
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    });

    it('can not update a student with missing fields', function () {
        authenticate();

        $student = createStudent();

        $payload = [
            'name' => null,
            'email' => null,
        ];

        putJson('api/v1/students/'.$student->uuid, $payload)
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name', 'email']);
    });

});
