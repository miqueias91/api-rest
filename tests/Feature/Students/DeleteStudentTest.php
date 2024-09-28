<?php

declare(strict_types=1);

use Illuminate\Foundation\Testing\RefreshDatabase;

use function Pest\Laravel\deleteJson;

uses(RefreshDatabase::class);

describe('Delete Student API', function () {

    it('can delete a student with authentication', function () {
        authenticate();

        $student = createStudent();

        // Enviar requisição DELETE
        deleteJson('api/v1/students/' . $student->uuid)
            ->assertNoContent();

            deleteJson('api/v1/students/' . $student->uuid)
            ->assertNotFound()
            ->assertJson(['message' => 'No query results for model [Modules\\Student\\Models\\Student].']);
    });

    it('can not delete a student without authentication', function () {
        $student = createStudent();

        // Tentar deletar sem autenticação
        deleteJson('api/v1/students/' . $student->uuid)
            ->assertUnauthorized()
            ->assertJson(['message' => 'Token not provided']);
    });

    it('can not delete a student that does not exist', function () {
        authenticate();

        // Tentar deletar um UUID que não existe
        $nonExistentUuid = '00000000-0000-0000-0000-000000000000';

        deleteJson('api/v1/students/' . $nonExistentUuid)
            ->assertNotFound()
            ->assertJson(['message' => 'No query results for model [Modules\\Student\\Models\\Student].']);
    });

    it('can not delete a student with an invalid uuid format', function () {
        authenticate();

        // Tentar deletar com um UUID mal formatado
        $invalidUuid = 'invalid-uuid';

        deleteJson('api/v1/students/' . $invalidUuid)
            ->assertNotFound()
            ->assertJson(['message' => 'No query results for model [Modules\\Student\\Models\\Student].']);
    });
});
