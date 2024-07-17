<?php

namespace Database\Seeders;

use App\Models\WebsiteMessage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebsiteMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebsiteMessage::factory(130)->create();
    }
}
