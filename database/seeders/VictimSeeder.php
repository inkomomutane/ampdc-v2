<?php

namespace Database\Seeders;

use App\Models\VictimCase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VictimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VictimCase::factory(130)->create();
    }
}
