<?php

namespace Database\Factories;

use App\Enums\CaseProgressStatus;
use App\Enums\PeriodOfViolenceAct;
use App\Models\ForwardingCase;
use App\Models\Organization;
use App\Models\Perpetrator;
use App\Models\SupposedReasonOfViolence;
use App\Models\User;
use App\Models\Victim;
use App\Models\VictimCase;
use App\Models\ViolenceIncidentLocation;
use App\Models\ViolenceType;
use Closure;
use Illuminate\Database\Eloquent\Casts\Json;
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
            'case_code' => incrementCode(),
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



    public function configure() :static
    {
        return $this->afterCreating(function (VictimCase $victimCase){
            if($this->faker->boolean){
                    ForwardingCase::create([
                        'status' => $victimCase->is_terminated ? CaseProgressStatus::SOLVED : CaseProgressStatus::FORWARDED,
                        'created_at' => $victimCase->created_at->addDays($this->faker->randomElement([1,2,3,4])),
                        'case_updates' => Json::encode([$this->faker->text]),
                        'organization_id'  => $victimCase->case_registered_by_organization_id,
                        'forwarded_to' => Organization::whereNot('id', $victimCase->case_registered_by_organization_id)->get()->random()->id,
                        'conclusion' => $victimCase->is_terminated ? $this->faker->text : '',
                        'case_id' => $victimCase->id,
                        'case_details' => $this->faker->sentence(),
                    ]);
            }
        });
    }
}
