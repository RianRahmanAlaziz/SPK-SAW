@foreach ($bobots as $bobot)
<div class="modal fade" id="modal-bobot-edit-{{ $bobot->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            <div class="modal-body">
                <main class="form-signin w-100 m-auto">
                    <h1 class="h3 mb-3 fw-normal text-center">Edit Data Bobot</h1>
                    <form action="/dashboard/databobot/{{ $bobot->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="nama_bobot">Tingkat Kepentingan</label>
                            <input type="text" class="form-control @error('nama_bobot') is-invalid @enderror" name="nama_bobot" id="nama_bobot" required autofocus value="{{ old('nama_bobot', $bobot->nama_bobot) }}">
                            @error('nama_bobot')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="n_bobot">Nilai Bobot</label>
                            <input type="number" name="n_bobot" id="n_bobot" class="form-control @error('n_bobot') is-invalid @enderror" required value="{{ old('n_bobot',  $bobot->n_bobot) }}">
                            @error('n_bobot')
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