<?php

namespace Database\Factories;

use App\Enums\CaseProgressStatus;
use App\Models\ForwardingCase;
use App\Models\Organization;
use App\Models\VictimCase;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ForwardingCase>
 */
class ForwardingCaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'case_id' => VictimCase::factory(),
            'conclusion' => fake()->sentence(),
            'case_updates' => Json::encode([]),
            'case_details' => '',
            'status' =>  fake()->randomElement(CaseProgressStatus::cases()),
            'organization_id' => Organization::all()->random()->id,
            'forwarded_to' =>  Organization::all()->random()->id,
        ];
    }
}
