<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Hardware;
use App\Models\Lab;
use App\Models\Role;
use App\Models\Software;
use App\Models\User;
use Database\Seeders\User as SeedersUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            SeedersUser::class,
            RoleSeeder::class,
            LabSeeder::class,
            HardwareSeeder::class,
            SoftwareSeeder::class,
            Prosedur::class
        ]);



        // Software::create(

        //     [

        //         'software' => 'Sistem Operasi',
        //         'lab_id' => '1',
        //     ]
        // );
        // Software::create(

        //     [

        //         'software' => 'text editor',
        //         'lab_id' => '1',
        //     ]
        // );
        // Software::create(

        //     [

        //         'software' => 'Sistem Operasi',
        //         'lab_id' => '2',
        //     ]
        // );
        // Software::create(

        //     [

        //         'software' => 'office',
        //         'lab_id' => '2',
        //     ]
        // );
        // Software::create(

        //     [

        //         'software' => 'Pdf Reader',
        //         'lab_id' => '2',
        //     ]
        // );
    }
}
