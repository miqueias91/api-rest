<?php

declare(strict_types=1);

use Illuminate\Support\Str;

use function Pest\Laravel\postJson;

it('can create a new student', function () {
    actingAs(testUser());

    $payload = [
        'name' => 'Test Student',
        'email' => 'teststudent@email.com'
    ];

    expect(postJson('api/v1/students', $payload))
        ->assertCreated();

});

it('can not create a new student without authentication', function () {
    $payload = [
        'name' => 'Test Student',
        'email' => 'teststudent@email.com'
    ];

    expect(postJson('api/v1/students', $payload))
        ->assertUnauthorized();
});

it('can not create a new student with content empty', function () {
    actingAs(testUser());

    $payload = [];

    expect(postJson('api/v1/students', $payload))
        ->assertUnprocessable();
});
