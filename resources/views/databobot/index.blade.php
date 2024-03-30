@extends('layouts.main')
@section('container')
        <div class="card shadow top">
            <div class="card-header">
                <h4 class="card-title">
                    Data Bobot
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
                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Bobot</th>
                                <th>Nilai Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bobots as $bobot)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $bobot->nama_bobot }}</td>
                                <td>{{ $bobot->n_bobot }}</td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  

<!-- Modal -->
@foreach ($bobots as $bobot)
<div class="modal fade" id="modal-hapus-{{ $bobot->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <form action="/dashboard/databobot/{{ $bobot->id }}" method="POST">
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
@include('databobot.modal')
@include('databobot.edit')