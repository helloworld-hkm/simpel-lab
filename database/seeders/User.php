<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'fullname' => 'admin simpel-lab',
            'password' => Hash::make('admin'),
            'phone' => '088232919767',
            'address' => 'bebel ,wonokerto, kabupaten pekalongan',
            'role_id' => 1,
        ]);
        DB::table('users')->insert([
            'username' => 'miftachul',
            'fullname' => 'miftachul chasanah, S.Pd',
            'password' => Hash::make('miftachul'),
            'phone' => '-',
            'address' => 'Sragi',
            'role_id' => 3,
        ]);
        DB::table('users')->insert([
            'username' => 'imam',
            'fullname' => 'imam ahmad subhan, ST',
            'password' => Hash::make('imam'),
            'phone' => '-',
            'address' => 'Sragi',
            'role_id' => 2,
        ]);
        DB::table('users')->insert([
            'username' => 'sriwati',
            'fullname' => 'sriwati ,S.Kom',
            'password' => Hash::make('sriwati'),
            'phone' => '-',
            'address' => 'Sragi',
            'role_id' => 4,
        ]);
        DB::table('users')->insert([
            'username' => 'rahmat',
            'fullname' => 'Rahmat Sudarmo ,S.Kom',
            'password' => Hash::make('rahmat'),
            'phone' => '-',
            'address' => 'Sragi',
            'role_id' => 4,
        ]);
        DB::table('users')->insert([
            'username' => 'bugar',
            'fullname' => 'Bugar Jati Lestari ,S.Pd',
            'password' => Hash::make('bugar'),
            'phone' => '-',
            'address' => 'Sragi',
            'role_id' => 5,
        ]);
    }
}
