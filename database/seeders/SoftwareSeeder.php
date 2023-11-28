<?php

namespace Database\Seeders;

use App\Models\Software;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SoftwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=1; $i <=6; $i++) {
            Software::create(
                [

                    'software' => 'Sistem Operasi',
                    'lab_id' => $i,
                ]
            );
            Software::create(
                [

                    'software' => 'Office',
                    'lab_id' => $i,
                ]
            );
            Software::create(
                [

                    'software' => 'Text Editor',
                    'lab_id' => $i,
                ]
            );
            Software::create(
                [

                    'software' => 'Software Desain',
                    'lab_id' => $i,
                ]
            );
            Software::create(
                [

                    'software' => 'Antivirus',
                    'lab_id' => $i,
                ]
            );
            Software::create(
                [

                    'software' => 'Browser',
                    'lab_id' => $i,
                ]
            );
            Software::create(
                [

                    'software' => 'Software Jaringan',
                    'lab_id' => $i,
                ]
            );
            Software::create(
                [

                    'software' => 'Pemprograman',
                    'lab_id' => $i,
                ]
            );
        }


        for ($i=7; $i <=8; $i++) {
            Software::create(
                [

                    'software' => 'Sistem Operasi',
                    'lab_id' => $i,
                ]
            );
            Software::create(
                [

                    'software' => 'Office',
                    'lab_id' => $i,
                ]
            );
            Software::create(
                [

                    'software' => 'Software Akuntansi',
                    'lab_id' => $i,
                ]
            );
            Software::create(
                [

                    'software' => 'Antivirus',
                    'lab_id' => $i,
                ]
            );
            Software::create(
                [

                    'software' => 'Browser',
                    'lab_id' => $i,
                ]
            );

            Software::create(
                [

                    'software' => 'PDF Reader',
                    'lab_id' => $i,
                ]
            );
        }


    }
}
