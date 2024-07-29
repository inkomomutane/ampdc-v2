<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enums\CaseProgressStatus;
use App\Enums\PeriodOfViolenceAct;
use App\Models\District;
use App\Models\Neighborhood;
use App\Models\Organization;
use App\Models\Perpetrator;
use App\Models\Province;
use App\Models\Role;
use App\Models\SupposedReasonOfViolence;
use App\Models\User;
use App\Models\Victim;
use App\Models\VictimCase;
use App\Models\ViolenceIncidentLocation;
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
            'id' => '01hv77xvhb4n8xfx36k1z1khjn'
        ],[
            'id' => '01hv77xvhb4n8xfx36k1z1khjn',
            'name' => 'AMPDC',
            'services' => ''
        ]);

        Organization::updateOrInsert([
            'id' => '01hv77rt2sezjeq1a057zj8jf9'
        ],[
            'id' => '01hv77rt2sezjeq1a057zj8jf9',
            'name' => 'MISAU',
            'services' => ''
        ]);


        Organization::updateOrInsert([
            'id' => '01hv77tpehwaj6znhzemqqwtmq'
        ],[
            'id' => '01hv77tpehwaj6znhzemqqwtmq',
            'name' => 'Muleide',
            'services' => ''
        ]);


     User::updateOrInsert([
            'id' => '01hv1bd7wmatmqfyqqtecpj6v7'
        ],[
            'name' => 'Admin',
            'email' => 'administrator@ampdc.org',
            'password' => \Hash::make(config('admin.admin_password')),
            'email_verified_at' => now(),
            'organization_id' => '01hv77xvhb4n8xfx36k1z1khjn'
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
            'name' => 'Física',
        ]);

        ViolenceType::updateOrInsert([
            'id' => '01hv76zgjexawh7dqca2k9snv0'
        ],[
            'id' => '01hv76zgjexawh7dqca2k9snv0',
            'name' => 'Psicológica',
        ]);

        ViolenceType::updateOrInsert([
            'id' => '01hvgctxffvmgbxm026batvhmp'
        ],[
            'id' => '01hvgctxffvmgbxm026batvhmp',
            'name' => 'Sexual'
            ]
        );

        Perpetrator::updateOrInsert([
            'id' => '01hv76zgjexawh7dqca2k9snv0'
        ],[
            'id' => '01hv76zgjexawh7dqca2k9snv0',
            'name' => 'Desconhecido',
        ]);


        Perpetrator::updateOrInsert([
            'id' => '01hx7csmacgsh902kq2fzfwjc6'
        ],[
            'id' => '01hx7csmacgsh902kq2fzfwjc6',
            'name' => 'Marido',
        ]);

        Perpetrator::updateOrInsert([
            'id' => '01hx7ct385qn157pjgjtw82hb9'
        ],[
            'id' => '01hx7ct385qn157pjgjtw82hb9',
            'name' => 'Namorado',
        ]);

        SupposedReasonOfViolence::updateOrInsert([
            'id' => '01hx7cvxbpk04skcac2rwgkxqt'
        ],[
            'id' => '01hx7cvxbpk04skcac2rwgkxqt',
            'name' => 'Ciúmes',
        ]);

        ViolenceIncidentLocation::updateOrInsert([
            'id' => '01hx7cxq1k1yte0x19r8hygnfj'
        ],[
            'id' => '01hx7cxq1k1yte0x19r8hygnfj',
            'name' => 'Casa',
        ]);

        ViolenceIncidentLocation::updateOrInsert([
            'id' => '01hx7cydw3w43x231mt7666706'
        ],[
            'id' => '01hx7cydw3w43x231mt7666706',
            'name' => 'Rua',
        ]);

        $baseUser =  $admin;
        $baseUser->loadMissing('organization');

        #--- Seeder de dados de testo todos seeder devem ser feitos de 1 de Janeiro de 2024 a te a data actual---#
    }
}
