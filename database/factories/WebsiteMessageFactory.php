<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WebsiteMessage>
 */
class WebsiteMessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'message' => $this->faker->text,
            'email' => $this->faker->email,
            'contact' => $this->faker->phoneNumber,
            'date' => $this->faker->dateTime,
            'is_read' => $this->faker->boolean,
        ];
    }
}
