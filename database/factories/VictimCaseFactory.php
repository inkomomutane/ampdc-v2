<?php

namespace Database\Factories;

use App\Enums\PeriodOfViolenceAct;
use App\Models\Organization;
use App\Models\Perpetrator;
use App\Models\SupposedReasonOfViolence;
use App\Models\User;
use App\Models\Victim;
use App\Models\VictimCase;
use App\Models\ViolenceIncidentLocation;
use App\Models\ViolenceType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<VictimCase>
 */
class VictimCaseFactory extends Factory
{

    protected $model = VictimCase::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $registered = $this->faker->dateTimeBetween('-1 year', 'now');

        return [
            'case_code' => $this->faker->unique()->uuid,
            'victim_id' => Victim::factory(),
            'violence_type_id' => ViolenceType::all()->random()->id,
            'perpetrator_id' => Perpetrator::all()->random()->id,
            'period_of_violence_act' => $this->faker->randomElement(PeriodOfViolenceAct::getValues()),
            'violence_incident_location_id' => ViolenceIncidentLocation::all()->random()->id,
            'supposed_reason_of_violence_id' => SupposedReasonOfViolence::all()->random()->id,
            'violence_details' => $this->faker->text,
            'is_violence_caused_death' => $this->faker->boolean,
            'is_terminated' => $this->faker->boolean,
            'conclusion' => $this->faker->text,
            'case_registered_by_id' => User::all()->random()->id,
            'case_registered_by_organization_id' => Organization::all()->random()->id,
            'case_registered_at' => $registered,
            'is_violence_reported_to_authorities' => $this->faker->boolean,
            'is_the_first_time' => $this->faker->boolean,
            'is_the_last_cases_reported_to_authorities' => $this->faker->boolean,
            'are_last_cases_resolved' => $this->faker->boolean,
            'perpetrator_address' => $this->faker->address,
            'perpetrator_contact' => $this->faker->phoneNumber,
            'perpetrator_profession' => $this->faker->jobTitle,
            'perpetrator_name' => $this->faker->name,
            'live_with_perpetrator' => $this->faker->boolean,
            'last_cases_resolution_details' => $this->faker->text,
            'last_violences_description' => $this->faker->text,
            'created_at' => $registered,
            'updated_at' => $registered,
        ];
    }
}
