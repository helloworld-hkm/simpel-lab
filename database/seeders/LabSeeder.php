<?php

namespace Database\Seeders;

use App\Models\Lab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lab::create(

            [

                'nama_lab' => 'TKJ 1',
                'role_id' => '4',
            ]
        );
        Lab::create(

            [

                'nama_lab' => 'lab TKJ 2',
                'role_id' => '4',
            ]
        );
        Lab::create(

            [

                'nama_lab' => 'TKJ 3',
                'role_id' => '4',
            ]
        );
        Lab::create(

            [

                'nama_lab' => 'Fiber Optik',
                'role_id' => '4',
            ]
        );
        Lab::create(

            [

                'nama_lab' => 'Simdig',
                'role_id' => '4',
            ]
        );
        Lab::create(

            [

                'nama_lab' => 'Multimedia',
                'role_id' => '4',
            ]
        );
        Lab::create(

            [

                'nama_lab' => 'AKL 1',
                'role_id' => '5',
            ]
        );
        Lab::create(

            [

                'nama_lab' => 'AKL 2',
                'role_id' => '5',
            ]
        );

    }
}
