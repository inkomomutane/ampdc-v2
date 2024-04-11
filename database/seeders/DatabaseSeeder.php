<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\District;
use App\Models\Neighborhood;
use App\Models\Organization;
use App\Models\Province;
use App\Models\Role;
use App\Models\User;
use App\Models\ViolenceType;
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

        Organization::updateOrInsert([
            'id' => '01HV6YQR7YGEMPYH4K2V0526J1'
        ],[
            'id' => '01HV6YQR7YGEMPYH4K2V0526J1',
            'name' => 'AMPDC',
            'services' => ''
        ]);

      User::updateOrInsert([
            'id' => '01hv1bd7wmatmqfyqqtecpj6v7'
        ],[
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'organization_id' => '01HV6YQR7YGEMPYH4K2V0526J1'
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

        Province::updateOrInsert([
            'id' => '01hv76mzhwfpv8e8sttfamwq5w'
        ],[
            'id' => '01hv76mzhwfpv8e8sttfamwq5w',
            'name' => 'Sofala'
        ]);

        District::updateOrInsert([
            'id' => '01hv76pa39xaf2q6q25dv2nyw8'
        ],[
            'id' => '01hv76pa39xaf2q6q25dv2nyw8',
            'name' => 'Beira',
            'province_id' => '01hv76mzhwfpv8e8sttfamwq5w'
        ]);

        #-- Neighborhoods --#

        Neighborhood::updateOrInsert([
            'id' => '01hv76sesr3mcqactgdbspw6f6'
        ],[
            'id' => '01hv76sesr3mcqactgdbspw6f6',
            'name' => 'Chipangara',
            'district_id' => '01hv76pa39xaf2q6q25dv2nyw8'
        ]);


        Neighborhood::updateOrInsert([
            'id' => '01hv76swxqh5bsd94bpv0fvt9p'
        ],[
            'id' => '01hv76swxqh5bsd94bpv0fvt9p',
            'name' => 'Goto',
            'district_id' => '01hv76pa39xaf2q6q25dv2nyw8'
        ]);

        Neighborhood::updateOrInsert([
            'id' => '01hv76td57ja7qvbq5twy931a0'
        ],[
            'id' => '01hv76td57ja7qvbq5twy931a0',
            'name' => 'Matacuane',
            'district_id' => '01hv76pa39xaf2q6q25dv2nyw8'
        ]);
        Neighborhood::updateOrInsert([
            'id' => '01hv76txb6c2mfqvw77qzvaqyj'
        ],[
            'id' => '01hv76txb6c2mfqvw77qzvaqyj',
            'name' => 'Munhava',
            'district_id' => '01hv76pa39xaf2q6q25dv2nyw8'
        ]);
        Neighborhood::updateOrInsert([
            'id' => '01hv76vb2763c30n17mfqap241'
        ],[
            'id' => '01hv76vb2763c30n17mfqap241',
            'name' => 'Inhamízua',
            'district_id' => '01hv76pa39xaf2q6q25dv2nyw8'
        ]);

        #-- Violence Types --#


        ViolenceType::updateOrInsert([
            'id' => '01hv76yj1fcx11dssx0j30bkw0'
        ],[
            'id' => '01hv76yj1fcx11dssx0j30bkw0',
            'name' => 'Espancamento',
            'description' => 'Espancamento'
        ]);

        ViolenceType::updateOrInsert([
            'id' => '01hv76zgjexawh7dqca2k9snv0'
        ],[
            'id' => '01hv76zgjexawh7dqca2k9snv0',
            'name' => 'Asfixia',
            'description' => 'Asfixia'
        ]);

    }
}
