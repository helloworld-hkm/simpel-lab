<?php

namespace Database\Seeders;

use App\Models\Hardware_Pc;
use App\Models\Komputer;
use App\Models\Software_Pc;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpekPCSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 11; $i++) {
            Komputer::create(
                [

                    'no_pc' => $i<10?'0'.$i:$i,
                    'status' => 'Normal',
                    'lab_id' => '1',
                ]
            );

            Hardware_Pc::create([
                'pc_id' => $i,
                'hardware_id' => '1',
                'keterangan' => 'Intel Core i3-9100'
            ]);
            Hardware_Pc::create([
                'pc_id' => $i,
                'hardware_id' => '2',
                'keterangan' => 'Corsair Vengeance LPX 8GB DDR4 2666MHz'
            ]);
            Hardware_Pc::create([
                'pc_id' => $i,
                'hardware_id' => '3',
                'keterangan' => 'ASRock B450M-HDV'
            ]);
            Hardware_Pc::create([
                'pc_id' => $i,
                'hardware_id' => '4',
                'keterangan' => 'Kingston A2000 NVMe PCIe M.2 128GB'
            ]);
            Hardware_Pc::create([
                'pc_id' => $i,
                'hardware_id' => '5',
                'keterangan' => 'Thermaltake Smart 500W'
            ]);
            Hardware_Pc::create([
                'pc_id' => $i,
                'hardware_id' => '6',
                'keterangan' => 'NZXT H510 Compact'
            ]);
            Hardware_Pc::create([
                'pc_id' => $i,
                'hardware_id' => '7',
                'keterangan' => 'AOC 22V2H 21.5 inch'
            ]);
            Hardware_Pc::create([
                'pc_id' => $i,
                'hardware_id' => '8',
                'keterangan' => 'Logitech MK270 combo'
            ]);
            Hardware_Pc::create([
                'pc_id' => $i,
                'hardware_id' => '9',
                'keterangan' => 'Logitech MK270 Combo'
            ]);

            Software_Pc::create([
                'pc_id' => $i,
                'software_id' => '1',
                'keterangan' => 'Windows 10 Pro'
            ]);
            Software_Pc::create([
                'pc_id' => $i,
                'software_id' => '2',
                'keterangan' => 'Microsoft Office 2016'
            ]);
            Software_Pc::create([
                'pc_id' => $i,
                'software_id' => '3',
                'keterangan' => 'Visual Studio Code'
            ]);
            Software_Pc::create([
                'pc_id' => $i,
                'software_id' => '4',
                'keterangan' => 'CorelDraw x7'
            ]);
            Software_Pc::create([
                'pc_id' => $i,
                'software_id' => '5',
                'keterangan' => 'Windows Defender'
            ]);
            Software_Pc::create([
                'pc_id' => $i,
                'software_id' => '6',
                'keterangan' => 'Chrome'
            ]);
            Software_Pc::create([
                'pc_id' => $i,
                'software_id' => '7',
                'keterangan' => 'Cisco Packet Tracer'
            ]);
        }
    }
}
