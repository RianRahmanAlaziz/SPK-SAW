<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{

    public function index()
    {
        return view('datakriteria.index', [
            'title' => 'Data Kriteria',
            'kriterias' => Kriteria::all()
        ]);
    }
}
