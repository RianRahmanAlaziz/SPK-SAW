<div class="modal fade" id="modal-siswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body">
                <main class="form-signin w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal text-center">Tambah Siswa</h1>
                    <form action="/dashboard/datasiswa" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" name="nama_siswa" id="nama_siswa" required autofocus value="{{ old('nama_siswa') }}">
                            @error('nama_siswa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="tgl_lhr">Tanggal Lahir</label>
                            <input type="date" name="tgl_lhr" id="tgl_lhr" class="form-control" required>
                            
                        </div>
                        <div class="form-group">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-select" required>
                                <option value="Laki-Laki" @if (old('jk') == "Laki-Laki") {{ 'selected' }} @endif>Laki-Laki</option>
                                <option value="Perempuan" @if (old('jk') == "Perempuan") {{ 'selected' }} @endif>Perempuan</option>
                            </select>
                        </div>

                    <button class="w-100 btn btn-lg btn-primary mt-5 dftr" type="submit">Tambah</button>
                    </form>

                </main>
                </div>
            </div>
            
        </div>
    </div>
</div>