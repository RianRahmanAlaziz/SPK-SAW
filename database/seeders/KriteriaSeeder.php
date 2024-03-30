<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kriteria::create([
            'b_preferensi' => 'c1',
            'nama_kriteria' => "Bahasa Indonesia(C1)",
            'tipe' => 'Benefit'
        ]);
        Kriteria::create([
            'b_preferensi' => 'c2',
            'nama_kriteria' => "Bahasa Inggris(C2)",
            'tipe' => 'Benefit'
        ]);
        Kriteria::create([
            'b_preferensi' => 'c3',
            'nama_kriteria' => "Matematika(C3)",
            'tipe' => 'Benefit'
        ]);
        Kriteria::create([
            'b_preferensi' => 'c4',
            'nama_kriteria' => "IPA(C4)",
            'tipe' => 'Benefit'
        ]);
    }
}
