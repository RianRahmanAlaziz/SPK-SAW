<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bobot;

class BobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bobot::create([
            'nama_bobot' => 'Sangat Baik',
            'n_bobot' => 5,
        ]);

        Bobot::create([
            'nama_bobot' => 'Baik',
            'n_bobot' => 4,
        ]);
        Bobot::create([
            'nama_bobot' => 'Cukup',
            'n_bobot' => 3,
        ]);
        Bobot::create([
            'nama_bobot' => 'Kurang Baik',
            'n_bobot' => 2,
        ]);
        Bobot::create([
            'nama_bobot' => 'Sangat Kurang',
            'n_bobot' => 1,
        ]);
    }
}
