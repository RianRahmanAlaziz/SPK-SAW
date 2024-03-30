<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function normalisasi()
    {
        return view('datanormalisasi.index', [
            'title' => 'Data Normalisasi',
            'siswas' => Siswa::all()
        ]);
    }

    public function rangking()
    {
        return view('rangking.index', [
            'title' => 'Data Rangking',
            'siswas' => Siswa::all()
        ]);
    }
}
