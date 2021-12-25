<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name(),
            'email' => $this->faker->email(),
            'phonenumber' => $this->faker->phoneNumber(),
            'location' => $this->faker->address()
        ];
    }
}