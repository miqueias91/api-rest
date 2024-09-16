<?php

declare(strict_types=1);

use function Pest\Laravel\getJson;

it('can fetch students list', function () {
    actingAs(testUser());

    expect(getJson('api/v1/students'))
        ->assertOk();
});

it('can not fetch students list without authentication', function () {
    expect(getJson('api/v1/students'))
        ->assertUnauthorized();
});

it('can fetch student', function () {
    actingAs(testUser());

    $payload = [
        'name' => fake()->name(),
        'email' => fake()->email(),
    ];

    $students = \App\Models\student::create($payload);

    $id = $students->id;

    expect(getJson('api/v1/students/' . $id))
        ->assertOk();
});

it('can not fetch student without authentication', function () {
    $id = 1;

    expect(getJson('api/v1/students/' . $id))
        ->assertUnauthorized();
});

it('can not fetch student without valid id', function () {
    actingAs(testUser());

    $id = 'abc';

    expect(getJson('api/v1/students/' . $id))
        ->assertNotFound();
});