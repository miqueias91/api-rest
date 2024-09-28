<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\getJson;

uses(RefreshDatabase::class);

function createStudent()
{
    return testStudent();
}

describe('Fetch Student API', function () {

    it('can fetch students list with authentication', function () {
        authenticate();

        createStudent();
        createStudent();
        createStudent();

        $response = getJson('api/v1/students')
            ->assertOk()
            ->assertJsonStructure([
                'data' => [
                    '*' => ['id', 'name', 'email', 'created_at', 'updated_at'],
                ],
            ]);

        expect($response->json('data'))->toHaveCount(3);

        $firstStudent = $response->json('data')[0];
        $this->assertNotNull($firstStudent['id']);
        $this->assertNotNull($firstStudent['name']);
    });

    it('can not fetch students list without authentication', function () {
        getJson('api/v1/students')
            ->assertUnauthorized()
            ->assertJson(['message' => 'Token not provided']);
    });

    it('can fetch a specific student with authentication', function () {
        authenticate();

        $student = createStudent();

        $response = getJson('api/v1/students/'.$student->uuid)
            ->assertOk()
            ->assertJsonStructure(['id', 'name', 'email', 'created_at', 'updated_at']);

        expect($response->json('id'))->toBe($student->uuid);
        expect($response->json('name'))->toBe($student->name);
        expect($response->json('email'))->toBe($student->email);
    });

    it('can not fetch a student without authentication', function () {
        $student = createStudent();

        getJson('api/v1/students/'.$student->uuid)
            ->assertUnauthorized()
            ->assertJson(['message' => 'Token not provided']);
    });

    it('can not fetch a student with an invalid uuid', function () {
        authenticate();

        $invalidUuid = '00000000-0000-0000-0000-000000000000';

        getJson('api/v1/students/'.$invalidUuid)
            ->assertNotFound()
            ->assertJson(['message' => 'No query results for model [Modules\\Student\\Models\\Student].']);
    });

});
