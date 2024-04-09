<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

      User::updateOrInsert([
            'id' => '01hv1bd7wmatmqfyqqtecpj6v7'
        ],[
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);


      $admin = User::where('id', '01hv1bd7wmatmqfyqqtecpj6v7')->first();

     Role::updateOrInsert([
            'id' => '01hv1yfks80m74f2j8198t8ger'
        ],[
            'id' => '01hv1yfks80m74f2j8198t8ger',
            'name' => 'Admin',
            'guard_name' => 'web',
        ]);

        $admin->assignRole('01hv1yfks80m74f2j8198t8ger');
    }
}
