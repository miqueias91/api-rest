<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\Student\Models\Student;

use function Pest\Laravel\postJson;

uses(RefreshDatabase::class);

describe('Create Student API', function () {

    it('can create a new student with authentication', function () {
        authenticate();

        $payload = [
            'name' => 'Test Student',
            'email' => 'teststudent@email.com',
        ];

        $response = postJson('api/v1/students', $payload)
            ->assertCreated()
            ->assertJsonStructure(['id', 'name', 'email', 'created_at', 'updated_at']);

        $this->assertDatabaseHas('students', [
            'email' => 'teststudent@email.com',
            'name' => 'Test Student',
        ]);

        expect($response->json('name'))->toBe('Test Student');
        expect($response->json('email'))->toBe('teststudent@email.com');
    });

    it('can not create a new student without authentication', function () {
        $payload = [
            'name' => 'Test Student',
            'email' => 'teststudent@email.com',
        ];

        postJson('api/v1/students', $payload)
            ->assertUnauthorized()
            ->assertJson(['message' => 'Token not provided']);
    });

    it('can not create a new student with content empty', function () {
        authenticate();

        $payload = [];

        postJson('api/v1/students', $payload)
            ->assertUnprocessable()
            ->assertJsonStructure(['errors']);
    });

    it('can not create a student with an existing email', function () {
        authenticate();

        Student::create([
            'name' => 'Test Student',
            'email' => 'existing@email.com',
        ]);

        $payload = [
            'name' => 'Test Student',
            'email' => 'existing@email.com',
        ];

        postJson('api/v1/students', $payload)
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['email']);
    });

    it('can not create a student with invalid email format', function () {
        authenticate();

        $payload = [
            'name' => 'Test Student',
            'email' => 'invalid-email',
        ];

        postJson('api/v1/students', $payload)
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['email']);
    });

    it('can not create a student with a too long name', function () {
        authenticate();

        $payload = [
            'name' => str_repeat('A', 256),
            'email' => 'teststudent@email.com',
        ];

        postJson('api/v1/students', $payload)
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    });

    it('can not create a student with a too short name', function () {
        authenticate();

        $payload = [
            'name' => str_repeat('A', 2),
            'email' => 'teststudent@email.com',
        ];

        postJson('api/v1/students', $payload)
            ->assertUnprocessable()
            ->assertJsonValidationErrors(['name']);
    });
});
