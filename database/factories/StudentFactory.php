<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Student\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define os dados padrão do modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'uuid' => $this->faker->uuid(),
        ];
    }
}
