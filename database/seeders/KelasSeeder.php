<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::create([
            'kode_kelas' => '7A',
            'nama_kelas' => 'Kelas 7A',
        ]);
        Kelas::create([
            'kode_kelas' => '7B',
            'nama_kelas' => 'Kelas 7B',
        ]);
        Kelas::create([
            'kode_kelas' => '7C',
            'nama_kelas' => 'Kelas 7C',
        ]);
    }
}
