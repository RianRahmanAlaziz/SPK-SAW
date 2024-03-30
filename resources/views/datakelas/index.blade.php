@extends('layouts.main')
@section('container')
        <div class="card shadow top">
            <div class="card-header">
                <h4 class="card-title">
                    Data Kelas
                </h4>
            </div>

            <div class="card-body">
                @if (session()->has('success'))
                <div class="row justify-content-start ps-3">
                    <div class="col-md-5 alert alert-success alert-dismissible fade show " role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
                @endif
                
                <div class="d-flex justify-content-end mb-4">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-kelas">Tambah Data</button>
                    
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Kode Kelas</th>
                                <th>Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelass as $kelas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kelas->kode_kelas }}</td>
                                <td>{{ $kelas->nama_kelas }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modal-kelas-edit-{{ $kelas->id }}"><i class="bi bi-pencil-square"></i></button>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-hapus-{{ $kelas->id }}"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  

<!-- Modal -->
@foreach ($kelass as $kelas)
<div class="modal fade" id="modal-hapus-{{ $kelas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        Anda Yakin Untuk MengHapus?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="/dashboard/datakelas/{{ $kelas->id }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-primary" type="submit">
                Hapus
            </button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endforeach

@endsection
@include('datakelas.modal')
@include('datakelas.edit')