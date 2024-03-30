<?php

namespace App\Http\Controllers;

use App\Models\ProsesHitung;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProsesHitungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        return view('proseshitung.index', [
            'title' => 'Proses Hitung',
            'siswas' => Siswa::all(),
            'nilaiS' => ProsesHitung::all(),

        ]);
    }

    public function proseshitung(Request $request)
    {
        $siswa_id        = $request->siswa_id;
        $bhs_indo        = $request->bhs_indo;
        $bhs_inggris     = $request->bhs_inggris;
        $mtk             = $request->mtk;
        $ipa             = $request->ipa;

        $allSubKriteria = DB::table('subkriterias')->get();
        foreach ($allSubKriteria as $value) {
            $w1 = round($value->c1 / ($value->c1 + $value->c2 + $value->c3 + $value->c4), 2);
            $w2 = round($value->c2 / ($value->c1 + $value->c2 + $value->c3 + $value->c4), 2);
            $w3 = round($value->c3 / ($value->c1 + $value->c2 + $value->c3 + $value->c4), 2);
            $w4 = round($value->c4 / ($value->c1 + $value->c2 + $value->c3 + $value->c4), 2);
            $nilai_s = round((pow($bhs_indo, $w1) * pow($bhs_inggris, $w2) * pow($mtk, $w3) * pow($ipa, $w4)), 3);

            $data = [
                'siswa_id'      => $siswa_id,
                'kelas_id'      => $value->kelas_id,
                'w1'            => $w1,
                'w2'            => $w2,
                'w3'            => $w3,
                'w4'            => $w4,
                's'             => $nilai_s,
                'v'             => 0,
            ];

            $cekDataProses = DB::table('proses_hitungs')->where('siswa_id', $siswa_id)->where('kelas_id', $value->kelas_id)->first();
            if ($cekDataProses) {
                DB::table('proses_hitungs')->where('siswa_id', $siswa_id)->where('kelas_id', $value->kelas_id)->update($data);
            } else {
                DB::table('proses_hitungs')->insert($data);
            }
        }
        $data_session = [
            'siswa_id' => $siswa_id,
        ];
        $request->session()->put('nilaiS', $data_session);
        return redirect()->back();
    }

    public function sesinilaiv(Request $request)
    {
        $data_session = [
            'nilai_v' => 'ada',
        ];
        $request->session()->put('nilaiV', $data_session);
        return redirect()->back();
    }

    public function proseshitungv(Request $request)
    {
        $siswa_id        = $request->siswa_id;
        $data_hitung = ProsesHitung::where('siswa_id', $siswa_id)->get();

        foreach ($data_hitung as $value) {
            $get_total_s = DB::table('proses_hitungs')
                ->select(DB::raw('SUM(s) AS total_s, kelas_id'))
                ->groupBy('kelas_id')
                ->get();

            foreach ($get_total_s as $nilai) {
                $data_v = [
                    'v' => round(($value->s / $nilai->total_s), 3)
                ];
                DB::table('proses_hitungs')
                    ->where('siswa_id', $value->siswa_id)
                    ->where('kelas_id', $value->kelas_id)
                    ->update($data_v);
            }
        }
        $data_session = [
            'siswa_id' => $siswa_id,
        ];

        $data_hasil = ProsesHitung::where('siswa_id', $siswa_id)->get();

        $request->session()->put('data_siswa', $data_session);

        return redirect()->back();
    }

    // public function hitungnormalisasi()
    // {
    //     $result = DB::table('siswas')
    //         ->selectRaw('   MAX(ipk) as max1, 
    //                         MAX(p_ortu) as max2, 
    //                         MAX(j_tanggungan) as max3, 
    //                         MAX(prestasi) as max4')
    //         ->first();

    //     $max = [
    //         'max1' => $result->max1,
    //         'max2' => $result->max2,
    //         'max3' => $result->max3,
    //         'max4' => $result->max4
    //     ];
    //     $allsiswa = Siswa::all();
    //     foreach ($allsiswa as $value) {
    //         $ipk          = round($result->max1 / $value->ipk);
    //         $p_ortu       = round($result->max2 / $value->p_ortu);
    //         $j_tanggungan = round($result->max3 / $value->j_tanggungan);
    //         $prestasi     = round($result->max4 / $value->prestasi);

    //         $data = [
    //             'siswa' => $value->nama_siswa,
    //             'ipk' => $ipk,
    //             'p_ortu' => $p_ortu,
    //             'j_tanggungan' => $j_tanggungan,
    //             'prestasi' => $prestasi,
    //             'siswa' => $value->nama_siswa,
    //             'ipk' => $ipk,
    //             'p_ortu' => $p_ortu,
    //             'j_tanggungan' => $j_tanggungan,
    //             'prestasi' => $prestasi,
    //         ];

    //         dd($data);
    //     }
    // }
}
