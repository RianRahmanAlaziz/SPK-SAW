@foreach ($kelass as $kelas)
<div class="modal fade" id="modal-kelas-edit-{{ $kelas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body">
                <main class="form-signin w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal text-center">Edit Data Kelas</h1>
                    <form action="/dashboard/datakelas/{{ $kelas->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="kode_kelas">Kode Kelas</label>
                            <input type="text" class="form-control @error('kode_kelas') is-invalid @enderror" name="kode_kelas" id="kode_kelas" required autofocus value="{{ old('kode_kelas', $kelas->kode_kelas) }}">
                            @error('kode_kelas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama_kelas">Kelas</label>
                            <input type="text" class="form-control @error('nama_kelas') is-invalid @enderror" name="nama_kelas" id="nama_kelas" required autofocus value="{{ old('nama_kelas', $kelas->nama_kelas) }}">
                            @error('nama_kelas')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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