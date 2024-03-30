@extends('layouts.main')
@section('container')
        <div class="card shadow top">
            <div class="card-header">
                <h4 class="card-title">
                    Analisis Hasil 
                </h4>
            </div>
            <div class="card-body">
            
                <form action="/proseshitung" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="siswa_id">Pilih Siswa</label>
                                <select class="form-select @error('siswa_id') is-invalid @enderror" name="siswa_id"  required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($siswas as $siswa)
                                        @if (old('siswa_id') == $siswa->id)
                                            <option value="{{ $siswa->id }}" selected>{{ $siswa->nama_siswa }}</option>
                                        @else
                                            <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('siswa_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                        <h6 class="card-title">
                            Nilai : 
                        </h6>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="bhs_indo">Bahasa Indonesia</label>
                                        <input type="number" class="form-control @error('bhs_indo') is-invalid @enderror" name="bhs_indo" id="bhs_indo" required autofocus  min="0" max="100" value="{{ old('bhs_indo') }}">
                                        @error('bhs_indo')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="bhs_inggris">Bahasa Inggris</label>
                                        <input type="number" class="form-control @error('bhs_inggris') is-invalid @enderror" name="bhs_inggris" id="bhs_inggris" required autofocus  min="0" max="100" value="{{ old('bhs_inggris') }}">
                                        @error('bhs_inggris')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mtk">Matematika</label>
                                        <input type="number" class="form-control @error('mtk') is-invalid @enderror" name="mtk" id="mtk" required autofocus  min="0" max="100" value="{{ old('mtk') }}">
                                        @error('mtk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="ipa">IPA</label>
                                        <input type="number" class="form-control @error('ipa') is-invalid @enderror" name="ipa" id="ipa" required autofocus  min="0" max="100" value="{{ old('ipa') }}">
                                        @error('ipa')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                    <button class="btn btn-lg btn-primary mt-3 fs-6" type="submit">Hitung Nilai S</button>
                    </form>
                
            </div>
        </div>  

        @if (!empty(session('nilaiS')))
            <div class="card shadow mt-5">
                <div class="card-header">
                    <h4 class="card-title">
                        Hitung Nilai S 
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>S</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @php
                                    $siswa_id = session('nilaiS')['siswa_id'];
                                        $nilaiS = App\Models\ProsesHitung::all();
                                    @endphp
                                @foreach ($nilaiS as $value)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $value->siswa->nama_siswa }}</td>
                                    <td>{{ $value->kelas->nama_kelas }}</td>
                                    <td>{{ $value->s }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                            <form action="/sesinilaiv" method="post">
                                @csrf
                                <button class="btn btn-lg btn-primary mt-3 fs-6" type="submit"> Hitung Nilai V</button>
                            </form>
                </div>
            </div>
        @endif

        @if (!empty(session('nilaiV')))
            <div class="card shadow mt-5">
                <div class="card-header">
                    <h4 class="card-title">
                        Hitung Nilai V
                    </h4>
                </div>
                <div class="card-body">
                    <form action="/proseshitungv" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="siswa_id">Pilih Siswa</label>
                                    <select class="form-select @error('siswa_id') is-invalid @enderror" name="siswa_id" >
                                        <option value="">-- Pilih --</option>
                                        @foreach ($siswas as $siswa)
                                            @if (old('siswa_id') == $siswa->id)
                                                <option value="{{ $siswa->id }}" selected>{{ $siswa->nama_siswa }}</option>
                                            @else
                                                <option value="{{ $siswa->id }}">{{ $siswa->nama_siswa }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('siswa_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-primary mt-3 fs-6" type="submit">Hitung Nilai V</button>
                    </form>
                </div>
            </div>
        @endif

        @if (!empty(session('data_siswa')))
            @php
                $siswa_id = session('data_siswa')['siswa_id'];
                $get_nama = DB::table('siswas')->select('id', 'nama_siswa')->where('id', $siswa_id)->first();
            @endphp
            <div class="card shadow mt-5">
                <div class="card-header">
                    <h4 class="card-title">
                        Hasil WP dengan Nama : {{ $get_nama->nama_siswa }}
                    </h4>
                </div>
                <div class="card-body">
                    @php
                        $data_hasil = App\Models\ProsesHitung::where('siswa_id', $siswa_id)->get();
                    @endphp
                    @foreach ($data_hasil as $value)
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td style="text-align: center; background-color:antiquewhite;">Vektor S {{ $value->kelas->kode_kelas }}</td>
                                        <td style="text-align: center; background-color:antiquewhite;">Vektor V {{ $value->kelas->kode_kelas }}</td>
                                    </tr>
                                    <tr>
                                        <td style="text-align: center;">{{ $value->s }}</td>
                                        <td style="text-align: center;">{{ $value->v }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforeach
                    @php
                        $rekomendasi_kelas = App\Models\ProsesHitung::selectRaw('MAX(v) AS nilai_tertinggi, kelas_id, (SELECT nama_kelas FROM kelas WHERE proses_hitungs.kelas_id=kelas.kode_kelas) as nama_kelas')->where('siswa_id', $siswa_id)
                                    ->groupBy('kelas_id')
                                    ->orderByDesc('nilai_tertinggi')
                                    ->first();
                    @endphp
                            <div class="col-md-12 alert alert-success alert-dismissible fade show" role="alert">
                                <h5 class="text-center"><i class="icon fa fa-check"></i> Rekomendasi {{ $rekomendasi_kelas->kelas->nama_kelas }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                    
                </div>
            </div>
        @endif
@endsection
