<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use App\Models\Kelas;
use App\Models\Subkriteria;
use Illuminate\Http\Request;

class SubkriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('datasubkriteria.index', [
            'title' => 'Data SubKriteria',
            'subkriterias' => Subkriteria::all(),
            'kelass' => Kelas::all(),
            'bobots' => Bobot::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'kelas_id' => 'required|unique:subkriterias',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'c4' => 'required'
        ]);

        Subkriteria::create($validator);

        return redirect('/dashboard/datasubkriteria')->with('success', 'Data SubKategori Baru Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function show(Subkriteria $subkriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Subkriteria $subkriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'kelas_id' => 'required',
            'c1' => 'required',
            'c2' => 'required',
            'c3' => 'required',
            'c4' => 'required'
        ];

        $validator = $request->validate($rules);

        Subkriteria::where('id', $id)->update($validator);

        return redirect('/dashboard/datasubkriteria')->with('success', 'Data SubKategori Berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subkriteria  $subkriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Subkriteria::destroy($id);

        return redirect('/dashboard/datasubkriteria')->with('success', 'Data SubKategori Berhasil di Hapus');
    }
}
