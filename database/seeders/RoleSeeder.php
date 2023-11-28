<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(
            [
                'id' => 1,
                'role' => 'admin',
            ]
        );
        Role::create(
            [
                'id' => 2,
                'role' => 'kepala program keahlian TKJT',
            ]
        );
        Role::create(

            [
                'id' => 3,
                'role' => 'kepala program keahlian AKL',
            ],
        );
        Role::create(

            [
                'id' => 4,
                'role' => 'Tim MR TKJT ',
            ],
        );
        Role::create(

            [
                'id' => 5,
                'role' => 'Tim MR AKL',
            ]
        );
    }
}
