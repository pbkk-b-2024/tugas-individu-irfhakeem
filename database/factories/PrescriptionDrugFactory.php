<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Drug;
use \App\Models\Prescription;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrescriptionDrug>
 */
class PrescriptionDrugFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'prescription_id' => fake()->randomElement(Prescription::pluck('prescription_id')->toArray()),
            'drug_id' => fake()->randomElement(Drug::pluck('drug_id')->toArray()),

        ];
    }
}
