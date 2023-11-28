<?php

namespace Database\Seeders;

use App\Models\Prosedur as ModelsProsedur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Prosedur extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsProsedur::create(
            [
                'keterangan' => 'Membersihkan hardware dari debu',
            ]
        );
        ModelsProsedur::create(
            [
                'keterangan' => 'Memeriksa setiap komponen hardware untuk mendeteksi kerusakan',
            ]
        );
        ModelsProsedur::create(
            [
                'keterangan' => 'Menjalankan disk cleanup untuk membersihkan file-file tidak perlu',
            ]
        );
        ModelsProsedur::create(
            [
                'keterangan' => 'Menjalankan disk defragmentation untuk mengoptimalkan kinerja hard disk',
            ]
        );
        ModelsProsedur::create(
            [
                'keterangan' => 'Memastikan perangkat input/output berfungsi dengan baik',
            ]
        );
        ModelsProsedur::create(
            [
                'keterangan' => 'Memastikan Aplikasi Penting bisa berjalan',
            ]
        );
        ModelsProsedur::create(
            [
                'keterangan' => 'menghapus program yang tidak diperlukan',
            ]
        );
        ModelsProsedur::create(
            [
                'keterangan' => 'mengecek pembaruan program antivirus',
            ]
        );
        ModelsProsedur::create(
            [
                'keterangan' => 'Melakukan pemindaian virus',
            ]
        );
    }
}
