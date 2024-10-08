<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Models\User;
use Modules\Student\Models\Student;

use function Pest\Laravel\withoutMiddleware;

uses(
    Tests\TestCase::class,
    // Illuminate\Foundation\Testing\RefreshDatabase::class,
)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', fn () => $this->toBe(1));

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function actingAs(User $user, string $guard = 'api'): User
{
    Auth::guard($guard)->setUser($user);

    Auth::shouldUse($guard);

    withoutMiddleware();

    return $user;
}

function testUser(): User
{
    $user = new User([
        'name' => fake()->name(),
        'email' => fake()->email(),
        'password' => Hash::make('password'),
    ]);

    $user->save();

    return $user;
}

function testStudent(): Student
{
    $student = new Student([
        'name' => fake()->name(),
        'email' => fake()->email(),
        'uuid' => fake()->uuid(),
    ]);

    $student->save();

    return $student;
}

function authenticate()
{
    actingAs(testUser());
}
