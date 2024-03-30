@foreach ($subkriterias as $subkriteria)
<div class="modal fade" id="modal-subkriteria-edit-{{ $subkriteria->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body">
                <main class="form-signin w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal text-center">Edit Data Subkriteria</h1>
                    <form action="/dashboard/datasubkriteria/{{ $subkriteria->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select class="form-select @error('kelas_id') is-invalid @enderror" name="kelas_id" >
                                @foreach ($kelass as $kelas)
                                    @if (old('kelas_id', $subkriteria->kelas_id) == $kelas->id)
                                        <option value="{{ $kelas->id }}" selected>{{ $kelas->nama_kelas }} = {{ $kelas->kode_kelas }}</option>
                                    @else
                                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }} = {{ $kelas->kode_kelas }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kelas_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="c1">C1</label>
                            <select class="form-select" name="c1" >
                                @foreach ($bobots as $bobot)
                                    @if (old('c1', $subkriteria->c1) == $bobot->n_bobot)
                                        <option value="{{ $bobot->n_bobot }}" selected>{{ $bobot->t_kepentingan }} = {{ $bobot->n_bobot }}</option>
                                    @else
                                        <option value="{{ $bobot->n_bobot }}">{{ $bobot->t_kepentingan }} = {{ $bobot->n_bobot }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="c2">C2</label>
                            <select class="form-select" name="c2" >
                                @foreach ($bobots as $bobot)
                                    @if (old('c2', $subkriteria->c2) == $bobot->n_bobot)
                                        <option value="{{ $bobot->n_bobot }}" selected>{{ $bobot->t_kepentingan }} = {{ $bobot->n_bobot }}</option>
                                    @else
                                        <option value="{{ $bobot->n_bobot }}">{{ $bobot->t_kepentingan }} = {{ $bobot->n_bobot }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="c3">C3</label>
                            <select class="form-select" name="c3" >
                                @foreach ($bobots as $bobot)
                                    @if (old('c3', $subkriteria->c3) == $bobot->n_bobot)
                                        <option value="{{ $bobot->n_bobot }}" selected>{{ $bobot->t_kepentingan }} = {{ $bobot->n_bobot }}</option>
                                    @else
                                        <option value="{{ $bobot->n_bobot }}">{{ $bobot->t_kepentingan }} = {{ $bobot->n_bobot }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="c4">C4</label>
                            <select class="form-select" name="c4" >
                                @foreach ($bobots as $bobot)
                                    @if (old('c4', $subkriteria->c4) == $bobot->n_bobot)
                                        <option value="{{ $bobot->n_bobot }}" selected>{{ $bobot->t_kepentingan }} = {{ $bobot->n_bobot }}</option>
                                    @else
                                        <option value="{{ $bobot->n_bobot }}">{{ $bobot->t_kepentingan }} = {{ $bobot->n_bobot }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                    <button class="w-100 btn btn-lg btn-primary mt-5 dftr" type="submit">Simpan</button>
                    </form>

                </main>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endforeach