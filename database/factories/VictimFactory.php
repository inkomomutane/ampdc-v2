<?php

namespace Database\Factories;

use App\Enums\CivilState;
use App\Enums\EducationLevel;
use App\Enums\Gender;
use App\Models\Victim;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Victim>
 */
class VictimFactory extends Factory
{

    protected  $model = Victim::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $birthDate = $this->faker->dateTimeBetween('-90 years');
        $age = now()->diffInYears($birthDate);
        return [
            'name' => $this->faker->name(),
            'age' => $age,
            'date_of_birth' => $birthDate,
            'gender' => $this->faker->randomElement(Gender::getValues()),
            'civil_state' => $this->faker->randomElement(CivilState::getValues()),
            'contact' => $this->faker->phoneNumber(),
            'has_profession' => $this->faker->boolean(),
            'profession' => $this->faker->word(),
            'education_level' => $this->faker->randomElement(EducationLevel::getValues()),
            'contact_alternative' => $this->faker->phoneNumber(),
            'contact_person' => $this->faker->name(),
            'contact_person_relationship' => $this->faker->word(),
            'has_children' => $this->faker->boolean(),
            'number_of_children' => $this->faker->numberBetween(1, 10),
            'live_with_other_parents' => $this->faker->boolean(),
            'relationship_duration' => $this->faker->numberBetween(1, 10),
            'city' => $this->faker->city(),
            'neighborhood' => $this->faker->word(),
            'address' => $this->faker->address(),
        ];
    }
}
