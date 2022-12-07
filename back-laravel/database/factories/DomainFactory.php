<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Domain>
 */
class DomainFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->domainWord(),
            'tld' => $this->faker->tld()
        ];
    }
}
