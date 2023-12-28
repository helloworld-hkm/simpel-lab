<?php

namespace Database\Seeders;

use App\Models\Aset;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // lab tkj1
        for ($i=1; $i <=8; $i++) {
            # code...

        Aset::create(
            [

                'aset' => 'Proyektor',
                'kondisi' => 'baik',
                'lab_id' => $i,
            ]
        );
        Aset::create(
            [

                'aset' => 'Printer',
                'kondisi' => 'baik',
                'lab_id' => $i,
            ]
        );
        Aset::create(
            [

                'aset' => 'Whiteboard',
                'kondisi' => 'baik',
                'lab_id' => $i,
            ]
        );
        Aset::create(
            [

                'aset' => 'Router',
                'kondisi' => 'baik',
                'lab_id' => $i,
            ]
        );
        Aset::create(
            [

                'aset' => 'Switch',
                'kondisi' => 'baik',
                'lab_id' => $i,
            ]
        );
    }
    }
}
